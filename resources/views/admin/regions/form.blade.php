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
                <form method="post" action="{{ route('regions.update', $region->id) }}">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">اسم المنطقة :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" name="region" value="{{ $region->name }}">
                        </div>
                    </div>
                    <div class="col-auto my-1 text-center">
                        <button type="submit" class="btn btn-primary">تعديل المنطقة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
