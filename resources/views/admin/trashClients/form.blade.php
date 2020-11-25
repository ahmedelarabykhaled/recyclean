@extends('layouts.admin')
@section('content')
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h2>تسجيل مشترك جديد</h2>
    <form action="{{ route('trashClients.store') }}" method="post" class="my-4">
        @csrf
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">الاسم :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="colFormLabel" placeholder="الاسم ..." required name="name">
            </div>
        </div>

        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">رقم التليفون :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="colFormLabel" placeholder="رقم التليفون ..." required name="phone">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">عدد الأسر :</label>
            <div class="form-check form-check-inline mx-3">
                <label class="form-check-label" for="inlineCheckbox1">1</label>
                <input class="form-check-input" type="radio" id="inlineCheckbox1" value="1" name="familyNumber" required>
            </div>
            <div class="form-check form-check-inline mx-3">
                <label class="form-check-label" for="inlineCheckbox2">2</label>
                <input class="form-check-input" type="radio" id="inlineCheckbox2" value="2" name="familyNumber" required>
            </div>
            <div class="form-check form-check-inline mx-3">
                <label class="form-check-label" for="inlineCheckbox3">3</label>
                <input class="form-check-input" type="radio" id="inlineCheckbox3" value="3" name="familyNumber" required>
            </div>
            <div class="form-check form-check-inline mx-3">
                <label class="form-check-label" for="inlineCheckbox4">4</label>
                <input class="form-check-input" type="radio" id="inlineCheckbox4" value="4" name="familyNumber" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">المبلغ المستحق :</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="colFormLabel" placeholder="المبلغ المستحق ..." disabled name="coast">
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
                <input type="text" class="form-control" id="colFormLabel" placeholder="العنوان ..." required name="address">
            </div>
        </div>


        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">رقم البطاقة :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="colFormLabel" placeholder="رقم البطاقة ..." name="NID">
            </div>
        </div>


        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">الحالة الاجتماعية :</label>
            <div class="col-sm-10">
                <select class="custom-select" id="selectBox" name="capability">
                    <option selected value="1" >مقتدر</option>
                    <option value="0" >غير مقتدر</option>
                </select>
            </div>
        </div>

        <div class="form-group text-center">
            <button class="btn btn-primary my-3 px-5">تسجيل</button>
        </div>

    </form>
@endsection
