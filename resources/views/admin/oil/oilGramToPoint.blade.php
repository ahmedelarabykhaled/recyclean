@extends('layouts.admin')
@section('content')

    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('admin/oilGramToPoint') }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">الوزن بالجرامات :</label>
            <div class="col-sm-10">
                <input name="weight" type="number" class="form-control" id="inputPassword" placeholder="الوزن بالجرامات" min="0" value="{{ $oilGramToPoint->last()->grams }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">النقط للوزن :</label>
            <div class="col-sm-10">
                <input name="points" type="number" class="form-control" id="inputPassword" placeholder="النقط للوزن" min="0" value="{{ $oilGramToPoint->last()->points }}">
            </div>
        </div>

        <div class="form-group row">
            <button class="btn btn-primary mx-auto">تعديل</button>
        </div>

    </form>

    <table class="table table-hover table-striped">
        <thead>
        <th>الرقم :</th>
        <th>الزون بالجرام :</th>
        <th>عدد النقط للوزن :</th>
        <th>تاريخ التسجيل :</th>
        <th>المسجل :</th>
        </thead>
        @foreach($oilGramToPoint as $oGTP)
            <tr>
                <td>#</td>
                <td>{{ $oGTP->grams }}</td>
                <td>{{ $oGTP->points }}</td>
                <td>{{ $oGTP->created_at }}</td>
                <td>{{ $oGTP->user->name }}</td>
            </tr>
        @endforeach
    </table>


@endsection
