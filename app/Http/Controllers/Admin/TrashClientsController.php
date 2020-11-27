<?php

namespace App\Http\Controllers\Admin;

use App\Models\Region;
use App\Models\TrashClient;
use App\Models\TrashSubscription;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TrashClientsController extends Controller
{
    public $pageName = 'المشتركين فى تجميع المخلفات';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $pageName = $this->pageName;
        $trashClients = TrashClient::get();
        return view('admin.trashClients.index', compact('pageName','trashClients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $trashClients = null;
        if (isset($request->clientName) && $request->clientName != '')
        {
            $users = User::where('name','like','%'.$request->clientName.'%')->get();
//            return $users;
            foreach ($users as $key => $user)
            {
                if ($user->trashClient == null)
                {
                    unset($users[$key]);
                }
            }
//            return $users;
            $trashClientsId = array_column($users->toArray(), 'id');
            $trashClients = TrashClient::whereIn('user_id',$trashClientsId)->get();
//            return $trashClients;
        }
        if (isset($request->ID) && $request->ID != '')
        {
            $users = User::where('user_id','like','%'.$request->ID.'%')->get();
//            return $users;
            foreach ($users as $key => $user)
            {
                if ($user->trashClient == null)
                {
                    unset($users[$key]);
                }
            }
//            return $users;
            $trashClientsId = array_column($users->toArray(), 'id');
            $trashClients = TrashClient::whereIn('user_id',$trashClientsId)->get();
//            return $trashClients;
        }
        $pageName = $this->pageName;
        $regions = Region::get();
        return view('admin.trashClients.form', compact('pageName', 'regions','trashClients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'familyNumber' => 'required',
            'region' => 'required',
            'address' => 'required',
            'capability' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->NID = $request->NID;
        $user->user_id = rand(0000000000, 9999999999);
        $user->address = $request->address;
        $user->save();


        $trashClient = new TrashClient;
        $trashClient->user_id = $user->id;
        $trashClient->families_count = $request->familyNumber;
        $trashClient->region_id = $request->region;
        $trashClient->capable = $request->capability;
        $trashClient->total_amount = TrashSubscription::get()->last()->coast;
        $trashClient->save();
        return back()->with('success','تم اضافة عميل جديد بنجاح');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        //
    }
}
