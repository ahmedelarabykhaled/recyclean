@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row">
            @if(auth()->user()->role->role_id == 1)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="oil-clients border p-5 text-center rounded "
                         style="background-color: rgb({{ rand(0,255) }}, {{ rand(0,255) }}, {{ rand(0,255) }})">
                        <h4>كل العملاء</h4>
                        <h1>{{ \App\Models\OilClient::get()->count() + \App\Models\TrashClient::get()->count()  }}</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="oil-clients border p-5 text-center rounded"
                         style="background-color: rgb({{ rand(0,255) }}, {{ rand(0,255) }}, {{ rand(0,255) }})">
                        <h4>المشتركين فى الزيت</h4>
                        <h1>{{ \App\Models\OilClient::get()->count() }}</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="oil-clients border p-5 text-center rounded"
                         style="background-color: rgb({{ rand(0,255) }}, {{ rand(0,255) }}, {{ rand(0,255) }})">
                        <h4>المشتركين فى القمامة</h4>
                        <h1>{{ \App\Models\TrashClient::get()->count() }}</h1>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="oil-clients border p-5 text-center rounded"
                         style="background-color: rgb({{ rand(0,255) }}, {{ rand(0,255) }}, {{ rand(0,255) }})">
                        <h4>عدد الموظفين</h4>
                        <h1>4</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="oil-clients border p-5 text-center rounded"
                         style="background-color: rgb({{ rand(0,255) }}, {{ rand(0,255) }}, {{ rand(0,255) }})">
                        <h4>المبلغ الكلى للمخلفات</h4>
                        <h1>{{ \App\Models\TrashRecieptTrack::sum('amount') }}</h1>
                    </div>
                </div>
            @endif
        </div>
    </div>


@endsection
