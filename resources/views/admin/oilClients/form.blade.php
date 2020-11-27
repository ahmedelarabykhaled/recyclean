@extends('layouts.admin')
@section('content')
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
    {{ $oilGramToPoint->grams }}
    <h2>تسجيل مشترك جديد</h2>
    <form action="{{ isset($oilClient) ? route('oilClients.update', $oilClient->id) : route('oilClients.store') }}"
          method="post" class="my-4">
        @csrf
        @if(isset($oilClient))
            @method('put')
        @endif
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">الاسم :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="colFormLabel" placeholder="الاسم ..."
                       name="name" {{ isset($oilClient) ? "value=".$oilClient->userData->name."" : '' }} >
            </div>
        </div>

        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">رقم التليفون :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="colFormLabel" placeholder="رقم التليفون ..."
                       name="phone" {{ isset($oilClient) ? "value=".$oilClient->userData->phone."" : '' }}>
            </div>
        </div>


        <div class="form-group row">
            <label for="regions" class="col-sm-2 col-form-label">المنطقة :</label>
            <select name="region" id="regions" class="form-control col-sm-10">
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" {{ isset($oilClient) && $oilClient->region && $oilClient->region->region->id == $region->id  ? 'selected' : ''}} >{{ $region->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">العنوان :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="colFormLabel" placeholder="العنوان ..."
                       name="address" {{ isset($oilClient) ? "value=".$oilClient->userData->address."" : '' }}>
            </div>
        </div>


        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">رقم البطاقة :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="colFormLabel" placeholder="رقم البطاقة ..."
                       name="NID" {{ isset($oilClient) ? "value=".$oilClient->userData->NID."" : '' }}>
            </div>
        </div>


        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">الكمية بالمللى جرام :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="grams" placeholder="الكميه بالمللى جرام ..."
                       name="amountByGram" {{ isset($oilClient) ? "value=".$oilClient->points."" : '' }}
                onkeyup="changePoints()">
            </div>
        </div>


        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">عدد النقاط :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="points" placeholder="عدد النقاط ..." disabled>
            </div>
        </div>


        <div class="form-group text-center">
            <button class="btn btn-primary my-3 px-5">{{ isset($oilClient) ? 'تعديل' : 'تسجيل' }}</button>
        </div>

    </form>
@endsection
@section('js')

    <script>
        function changePoints() {
            let grams = {{ $oilGramToPoint->grams }};
            let points = {{ $oilGramToPoint->points }};

            const $inputGrams = $('#grams').val();
            $('#points').val( ( $inputGrams * points ) / grams );

        }


        // $('#points').val(points);
    </script>

@endsection
