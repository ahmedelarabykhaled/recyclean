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
            <h6>الاشتراك المطلوب دفعه : 315</h6>
        </div>
        <div class="card-content p-4 container-fluid">
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
                <div class="col-3">
                    <p>الشهر المطلوب دفعه :</p>
                </div>
                <div class="col-9">
                    {{ date('m') }}
                </div>
                <div class="col-12 p-4 text-center">
                    <form action="{{ route('paySubscription', $client->id) }}" method="post">
                        @csrf
                        <button class="btn btn-success">دفع الاشتراك </button>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
