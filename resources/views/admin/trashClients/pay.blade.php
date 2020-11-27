@extends('layouts.admin')
@section('content')

    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div class="card">
        <div class="card-header">
            <h6>الاشتراك المطلوب دفعه : {{ $client->families_count * \App\Models\TrashSubscription::get()->last()->coast }}</h6>
        </div>
        <div class="card-content m-4 container-fluid">
            <div class="row">
                <div class="col-3">
                    <p>اسم العميل :</p>
                </div>
                <div class="col-9">
                    {{ $client->user->name }}
                </div>
                <div class="col-3">
                    <p>عدد الاسر :</p>
                </div>
                <div class="col-9">
                    {{ $client->families_count }}
                </div>

                <div class="container-fluid">
                    <form class="row" action="{{ route('paySubscription', $client->id) }}" method="post">
                        @csrf
                        <div class="col-3">
                            <p>الشهر المطلوب دفعه :</p>
                        </div>
                        <div class="col-9">
                            <input type="month" class="form-control" name="month">
                        </div>
                        <button class="btn btn-success">دفع الاشتراك</button>
                    </form>
                </div>
            </div>
            <table class="table table-bordered table-hover table-striped my-5">
                <thead>
                <th>الشهر</th>
                <th>المبلغ</th>
                <th>تاريخ الدفع</th>
                <th>مسؤول الدفع</th>
                </thead>
                <tbody>
                @foreach($client->subscription as $sub)
                    <tr>
                        <td>{{ $sub->date }}</td>
                        <td>{{ $sub->amount }}</td>
                        <td>{{ date('d-m-Y', strtotime($sub->created_at)) }}</td>
                        <td>{{ $sub->employee->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection
