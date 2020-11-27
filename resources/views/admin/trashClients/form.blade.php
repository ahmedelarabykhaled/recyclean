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
            <form class="form-inline" method="get" action="{{ route('trashClients.create') }}">
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
            <form class="form-inline">
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
            {{--            display the founded users--}}
            @if(isset($trashClients) && $trashClients)
                <h6 class="text-center my-3">نتيجة البحث </h6>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <th>ال ID :</th>
                    <th>الاسم :</th>
                    <th>عدد الاسر :</th>
                    <th>المبلغ الشهرى :</th>
                    <th>المنطقة :</th>
                    <th>دفع الاشتراك :</th>
                    </thead>
                    <tbody>
                    @foreach($trashClients as $client)
                        <tr>
                            <td>{{ $client->user->user_id }}</td>
                            <td>{{ $client->user->name }}</td>
                            <td>{{ $client->families_count }}</td>
                            <td>{{ $client->families_count * \App\Models\TrashSubscription::get()->last()->coast }}</td>
                            <td>{{ $client->region->name }}</td>
                            <td>
                                <a href="#" class="btn btn-warning">دفع الاشتراك</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            {{--            end display the founded users--}}
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>تسجيل مشترك جديد</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('trashClients.store') }}" method="post" class="my-4">
                @csrf
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">الاسم :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" placeholder="الاسم ..." required
                               name="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">رقم التليفون :</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="colFormLabel" placeholder="رقم التليفون ..."
                               required
                               name="phone">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">عدد الأسر :</label>
                    <div class="form-check form-check-inline mx-3">
                        <label class="form-check-label" for="inlineCheckbox1">1</label>
                        <input class="form-check-input coast" type="radio" id="inlineCheckbox1" value="1"
                               name="familyNumber"
                               required>
                    </div>
                    <div class="form-check form-check-inline mx-3">
                        <label class="form-check-label" for="inlineCheckbox2">2</label>
                        <input class="form-check-input coast" type="radio" id="inlineCheckbox2" value="2"
                               name="familyNumber"
                               required>
                    </div>
                    <div class="form-check form-check-inline mx-3">
                        <label class="form-check-label" for="inlineCheckbox3">3</label>
                        <input class="form-check-input coast" type="radio" id="inlineCheckbox3" value="3"
                               name="familyNumber"
                               required>
                    </div>
                    <div class="form-check form-check-inline mx-3">
                        <label class="form-check-label" for="inlineCheckbox4">4</label>
                        <input class="form-check-input coast" type="radio" id="inlineCheckbox4" value="4"
                               name="familyNumber"
                               required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">المبلغ المستحق :</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="coast" placeholder="المبلغ المستحق ..." disabled
                               name="coast">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="selectBox" class="col-sm-2 col-form-label">المنطقة :</label>
                    <div class="col-sm-10">
                        <select name="region" class="custom-select" id="selectBox">
                            <option disabled selected>اختر منطقة</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">العنوان :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" placeholder="العنوان ..." required
                               name="address">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">رقم البطاقة :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" placeholder="رقم البطاقة ..."
                               name="NID">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">الحالة الاجتماعية :</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="selectBox" name="capability">
                            <option selected value="1">مقتدر</option>
                            <option value="0">غير مقتدر</option>
                        </select>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-primary my-3 px-5">تسجيل</button>
                </div>

            </form>
        </div>
    </div>

@endsection
@section('js')

    <script>

        let trashSub = '{{ \App\Models\TrashSubscription::get()->last()->coast }}'
        $('#coast').val(trashSub);

        $('.coast').on('click', function () {
            let selectedItemValue = $(this).val();
            $('#coast').val(selectedItemValue * parseInt(trashSub));
        })
    </script>

@endsection
