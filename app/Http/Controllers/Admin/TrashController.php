<?php

namespace App\Http\Controllers\Admin;

use App\Models\TrashSubscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TrashController extends Controller
{
    public function trashSubscriptionView()
    {
        $pageName = "سعر الاشتراك الشهرى لتجميع المخلفات";
        $trashSubscripers = TrashSubscription::get();
        return view('admin.trash.trashSubscriptionForm',compact('pageName','trashSubscripers'));
    }

    public function trashSubscriptionSave(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'coast' => 'required',
            'count' => 'required'
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator);
        }
        $trashSubscription = new TrashSubscription;
        $trashSubscription->coast = $request->coast;
        $trashSubscription->family_count = $request->count;
        $trashSubscription->user_id = auth()->check() ? auth()->user()->id : 1;
        $trashSubscription->save();
        return back()->with('success','تم تعديل التكلفة بنجاح');
    }
}
