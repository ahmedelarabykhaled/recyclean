@extends('layouts.admin')
@section('content')

    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card my-3">
        <div class="card-header">
            <h3>تعديل سعر الاشتراك الشهرى</h3>
        </div>
        <form action="{{ url('admin/trashSubscription') }}" method="post">
            @csrf
            <div class="card-body p-3">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">الاشتراك :</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputPassword" value="{{ $trashSubscripers->last()->coast }}" name="coast">
                    </div>
                </div>
            </div>
            <div class="form-group w-100 text-center">
                <button class="btn btn-primary mx-auto">تعديل</button>
            </div>
        </form>
    </div>


    <table class="table table-striped table-hover border">
        <thead>
        <th>الاشتراك الشهرى :</th>
        <th>المسجل :</th>
        <th>تاريخ التسجيل :</th>
        </thead>
        <tbody>
        @foreach($trashSubscripers as $trashSubscriper)
            <tr>
                <td>{{ $trashSubscriper->coast }}</td>
                <td>{{ $trashSubscriper->user->name }}</td>
                <td>{{ $trashSubscriper->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
