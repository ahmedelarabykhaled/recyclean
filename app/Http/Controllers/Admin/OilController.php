<?php

namespace App\Http\Controllers\Admin;

use App\Models\OilGramToPoint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OilController extends Controller
{
    public function oilGramToPointView()
    {
        $pageName = 'تحويل الزيت بالجرام الى نقط';
        $oilGramToPoint = OilGramToPoint::get();
        return view('admin.oil.oilGramToPoint',compact('pageName','oilGramToPoint'));
    }

    public function oilGramToPointSave(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'points' => 'required',
            'weight' => 'required'
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $oilGramToPoint = new OilGramToPoint;
        $oilGramToPoint->grams = $request->weight;
        $oilGramToPoint->points = $request->points;
        $oilGramToPoint->user_id = auth()->check() ? auth()->user()->id : 1;
        $oilGramToPoint->save();
        return back()->with('success','تم تعديل البيانات بنجاح');

    }
}
