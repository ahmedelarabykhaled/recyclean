<?php

namespace App\Http\Controllers\Admin;

use App\Models\OilClient;
use App\Models\OilGramToPoint;
use App\Models\Region;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OilClientsController extends Controller
{
    public $pageName = 'المشتركين فى تجميع الزيت';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $pageName = $this->pageName;
//        return $request;
//        if ($request->clientName)
//        {
//            $users = User::where('name','like',$request->clientName)->get();
//        }
        $oilClients = OilClient::with('userData')->get();
//        $oilClientsSearchIds = OilClient::get()->pluck('user_id');
//        return $oilClientsSearchIds;
//        $usersSearchIds = User::where('name','like',$request->clientName)->get()->pluck('id');
//        return $usersSearchIds
//        return array_intersect($oilClientsSearchIds->toArray(), $usersSearchIds->toArray());
        return view('admin.oilClients.index',compact('pageName','oilClients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $pageName = $this->pageName;
        $regions = Region::get();
        $oilGramToPoint = OilGramToPoint::get()->last();
        return view('admin.oilClients.form',compact('pageName','regions','oilGramToPoint'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'NID' => 'required',
            'amountByGram' => 'required'
        ]);
        if ($validator->fails())
        {
            return back()->withErrors($validator);
        }
        $oilGramToPoint = OilGramToPoint::get()->last();

        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->NID = $request->NID;
        $user->user_id = rand(0000000000,9999999999);
        $user->save();

        $oilClient = new OilClient;
        $oilClient->user_id = $user->id;
        $oilClient->points = ( $request->amountByGram * $oilGramToPoint->points ) / $oilGramToPoint->grams;
        $oilClient->save();

        return redirect('admin/oilClients')->with('success','تم تسجيل مشترك فى الزيت بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $pageName = $this->pageName;
        $oilGramToPoint = OilGramToPoint::get()->last();
        $oilClient = OilClient::with('userData')->findOrFail($id);
        return view('admin.oilClients.form',compact('pageName','oilClient','oilGramToPoint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'NID' => 'required',
            'amountByGram' => 'required'
        ]);
        if ($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $oilGramToPoint = OilGramToPoint::get()->last();

        $oilClient = OilClient::findOrFail($id);
        $oilClient->points = ( $request->amountByGram * $oilGramToPoint->points ) / $oilGramToPoint->grams;
        $oilClient->save();

        $user = User::findOrFail($oilClient->user_id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->NID = $request->NID;
        $user->save();

        return redirect('admin/oilClients')->with('success','تم تعديل العميل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
