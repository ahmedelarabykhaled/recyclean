@extends('layouts.admin')
@section('content')
    <div class="p-3">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger m-2">{{ $error }}</div>
        @endforeach
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                بحث عن عميل
            </div>
            <div class="card-body">
                <form class="form-inline">
                    <div class="form-group mb-2">
                        <label for="staticEmail1" class="sr-only">Email</label>
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail1" value="بحث ب id العميل :">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">id العميل ...</label>
                        <input type="text" name="clientId" class="form-control" id="inputPassword2" placeholder="id العميل ...">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">بحث</button>
                </form>
                <form class="form-inline">
                    <div class="form-group mb-2">
                        <label for="staticEmail2" class="sr-only">Email</label>
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="بحث باسم العميل :">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">اسم العميل ...</label>
                        <input type="text" name="clientName" class="form-control" id="inputPassword2" placeholder="اسم العميل ...">
                    </div>
                    <button type="submit" class="btn btn-primary mb -2">بحث</button>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover mt-4">
            <thead>
            <th>الرقم :</th>
            <th>كود العميل :</th>
            <th>اسم العميل :</th>
            <th>تاريخ التسجيل :</th>
            <th>عدد النقاط :</th>
            <th>تعديل :</th>
            </thead>
            <tbody>
            @foreach($oilClients as $client)
                <tr>
                    <td>#</td>
                    <td>{{ $client->userData->user_id }}</td>
                    <td>{{ $client->userData->name }}</td>
                    <td>{{ $client->userData->created_at }}</td>
                    <td>{{ $client->points }}</td>
                    <td>
                        <a href="{{ route('oilClients.edit', $client->id) }}" class="btn btn-warning">تعديل</a>
                    <!--
{{--                        <form action="{{ route('regions.destroy', $region->id) }}" method="post" style="display: inline-block;">--}}
                            @csrf
                    @method('delete')
                        <button class="btn btn-danger">حذف</button>
                    </form>
-->
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
