@extends('layouts.admin')
@section('content')

    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div class="card mb-3">
        <div class="card-header">
            <h6>بحث عن مشترك</h6>
        </div>
        <div class="card-body">
            <form class="form-inline" method="get" action="{{ route('trashClients.index') }}">
                <div class="form-group mb-2">
                    <label for="staticEmail2" class="sr-only">Email</label>
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail2"
                           value="بحث بالأسم :">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only">Password</label>
                    <input type="text" class="form-control" id="inputPassword2" placeholder="بحث بالأسم ..."
                           name="clientName">
                </div>
                <button type="submit" class="btn btn-primary mb-2">بحث</button>
            </form>
            <form class="form-inline" method="get" action="{{ route('trashClients.index') }}">
                <div class="form-group mb-2">
                    <label for="staticEmail2" class="sr-only">Email</label>
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail2"
                           value="بحث بالID :">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only">Password</label>
                    <input type="text" class="form-control" id="inputPassword2" placeholder="بحث بالID ..." name="ID">
                </div>
                <button type="submit" class="btn btn-primary mb-2">بحث</button>
            </form>
        </div>
    </div>


    <table class="table border table-hover table-striped">
        <thead>
        <th>الرقم :</th>
        <th>الID :</th>
        <th>الاسم :</th>
        <th>عدد الاسر :</th>
        <th>المبلغ الشهرى :</th>
        <th>المنطقة :</th>
        <th>تعديل :</th>
        <th>دفع الاشتراك :</th>
        </thead>
        <tbody>
        @foreach($trashClients as $client)
            <tr>
                <td>#</td>
                <td>{{ $client->user->user_id }}</td>
                <td>{{ $client->user->name }}</td>
                <td>{{ $client->families_count }}</td>
                <td>{{ \App\Models\TrashSubscription::where('family_count',$client->families_count)->get()->count() != 0 ? \App\Models\TrashSubscription::where('family_count',$client->families_count)->get()->last()->coast : 0 }}</td>
                <td>{{ $client->region->name }}</td>
                <td>
                    <a href="{{ route('trashClients.edit', $client->id) }}" class="btn btn-warning">تعديل</a>
                </td>
                <td>
                    <a href="{{ route('paySubscription' , $client->id) }}" class="btn btn-warning">دفع الاشتراك</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
