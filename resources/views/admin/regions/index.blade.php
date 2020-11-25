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
                اضافة منطقة
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('regions.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">اسم المنطقة :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" name="region">
                        </div>
                    </div>
                    <div class="col-auto my-1 text-center">
                        <button type="submit" class="btn btn-primary">اضافه المنطقة</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover mt-4">
            <thead>
            <th>الرقم :</th>
            <th>اسم المنطقة :</th>
            <th>كود المنطقة :</th>
            <th>تعديل :</th>
            </thead>
            <tbody>
            @foreach($regions as $region)
                <tr>
                    <td>#</td>
                    <td>{{ $region->name }}</td>
                    <td>{{ $region->region_id }}</td>
                    <td>
                        <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-warning">تعديل</a>
                        <!--
                        <form action="{{ route('regions.destroy', $region->id) }}" method="post" style="display: inline-block;">
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
