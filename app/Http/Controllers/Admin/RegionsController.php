<?php

namespace App\Http\Controllers\Admin;

use App\Models\Region;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionsController extends Controller
{
    public $pageName = 'المناطق';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $regions = Region::get();
        $pageName = $this->pageName;
        return view('admin.regions.index', compact('pageName', 'regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $regions = Region::get();
        $pageName = $this->pageName;
        return view('admin.regions.form', compact('pageName', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'region' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('admin/regions/create')->withErrors($validator);
        }
        $alphabet = range('A', 'Z');
//        print "<pre>".print_r($alphabet, true)."</pre>";
//        die();
        $reservedChars = Region::get()->pluck('region_char')->toArray();
        foreach ($alphabet as $key => $value) {
            if (($key = array_search($value, $reservedChars)) !== false) {
                unset($alphabet[$key]);
            }
        }
        if (sizeof($alphabet) == 0) {
            $alphabet = range('AA', 'ZZ');
        }
//        return reset($alphabet);
        $selectedChar = reset($alphabet);
        $region = new Region;
        $region->region_char = $selectedChar;
        $region->region_id = $selectedChar . rand(00000, 99999);
        $region->name = $request->region;
        $region->save();
        return redirect('admin/regions')->with('success', 'تم اضافة المنطقة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageName = $this->pageName;
        $region = Region::findOrFail($id);
        return view('admin.regions.form',compact('pageName','region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(),[
            'region' => 'required'
        ]);
        if ($validate->fails())
        {
            return back()->withErrors($validate);
        }
        $region = Region::findOrFail($id);
        $region->name = $request->region;
        $region->save();
        return redirect('admin/regions')->with('success','تم تعديل المنطقة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        Region::findOrFail($id)->delete();
//        return redirect('admin/regions')->with('success','تم حذف المنطقة بنجاح');
    }
}
