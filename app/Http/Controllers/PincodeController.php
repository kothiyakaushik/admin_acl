<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Models\Country;
use App\Models\States;
use App\Models\Pincodes;
use App\Models\Permission;
use Illuminate\Support\Facades\Session;
use DB;


class PincodeController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        //echo $user->roles();exit;


        // $state = States::whth()->orderBy('id','DESC')->paginate(5);
        // $country = Country::orderBy('id','DESC');

        $state = Pincodes::with('pincodeState')->orderBy('id','DESC')->paginate(5);


        //dd($state);exit;

        return view('state.index',compact('state'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $permission = Permission::get();

        $country = Country::lists('name', 'id');

        return view('state.create',compact('permission', 'country'));

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        //echo "call";exit;

        $this->validate($request, [

            'name' => 'required|unique:roles,name',

            //'permission' => 'required',

        ]);

        //$user = Auth::id();
        //echo "<pre>";print_r($request->all());exit;


        $state = new States();

        $state->name = $request->input('name');
        $state->country_id = $request->input('country_id');
        $state->user_id = Auth::id();
        //$role->display_name = $request->input('display_name');

        //$role->description = $request->input('description');

        $state->save();


        // foreach ($request->input('permission') as $key => $value) {

        //     $role->attachPermission($value);

        // }

        return redirect()->route('state.index')->with('success','State created successfully');
    }

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $state = States::with('stateCountry')->find($id);



        $rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")

            ->where("permission_role.role_id",$id)

            ->get();


        return view('state.show',compact('state','rolePermissions'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $state = States::find($id);
        $country = Country::lists('name', 'id');

        $selected_country = array('selected_country'=> $state->country_id);


        //echo "<pre>";print_r($state);exit;

        $permission = Permission::get();

        $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)
            ->lists('permission_role.permission_id','permission_role.permission_id');

        return view('state.edit',compact('state','country','permission','rolePermissions'));

    }


    /**

     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required'
        ]);

       // echo "<pre>";print_r($request->all());exit;

        $state = States::find($id);

        $state->name = $request->input('name');
        $state->country_id = $request->input('country_id');

        $state->save();


        // DB::table("permission_role")->where("permission_role.role_id",$id)

        //     ->delete();


        // foreach ($request->input('permission') as $key => $value) {

        //     $role->attachPermission($value);

        // }


        return redirect()->route('state.index')

                        ->with('success','State updated successfully');

    }

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        //DB::table("countries")->where('id',$id)->delete();
        States::where('id',$id)->delete();

        return redirect()->route('state.index')

                        ->with('success','State deleted successfully');

    }

}