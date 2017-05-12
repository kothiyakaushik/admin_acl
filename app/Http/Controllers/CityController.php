<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Models\Country;
use App\Models\States;
use App\Models\Cities;
use App\Models\Permission;
use Illuminate\Support\Facades\Session;
use DB;


class CityController extends Controller

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

        $city = Cities::with('cityState')->orderBy('id','DESC')->paginate(5);


        //dd($state);exit;

        return view('city.index',compact('city'))
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

        $state = States::lists('name', 'id');

        return view('city.create',compact('permission', 'state'));

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


        $city = new Cities();

        $city->name = $request->input('name');
        $city->state_id = $request->input('state_id');
        $city->user_id = Auth::id();
        //$role->display_name = $request->input('display_name');

        //$role->description = $request->input('description');

        $city->save();


        // foreach ($request->input('permission') as $key => $value) {

        //     $role->attachPermission($value);

        // }

        return redirect()->route('city.index')->with('success','City created successfully');
    }

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $city = Cities::with('cityState')->find($id);



        $rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")

            ->where("permission_role.role_id",$id)

            ->get();


        return view('city.show',compact('city','rolePermissions'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $city = Cities::find($id);
        $state = States::lists('name', 'id');

        //$selected_country = array('selected_country'=> $state->country_id);


        //echo "<pre>";print_r($state);exit;

        $permission = Permission::get();

        $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)
            ->lists('permission_role.permission_id','permission_role.permission_id');

        return view('city.edit',compact('city','state','permission','rolePermissions'));

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

        $city = Cities::find($id);

        $city->name = $request->input('name');
        $city->state_id = $request->input('state_id');

        $city->save();


        // DB::table("permission_role")->where("permission_role.role_id",$id)

        //     ->delete();


        // foreach ($request->input('permission') as $key => $value) {

        //     $role->attachPermission($value);

        // }


        return redirect()->route('city.index')

                        ->with('success','City updated successfully');

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
        Cities::where('id',$id)->delete();

        return redirect()->route('city.index')

                        ->with('success','City deleted successfully');

    }

}