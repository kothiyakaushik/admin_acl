<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Models\Country;
use App\Models\Permission;
use Illuminate\Support\Facades\Session;
use DB;


class CountryController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        //echo $user->roles();exit;


        $country = Country::orderBy('id','DESC')->paginate(5);

        //echo "<pre>";print_r($request->all());exit;

        return view('country.index',compact('country'))
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

        return view('country.create',compact('permission'));

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
        //echo "<pre>";print_r($user);exit;


        $country = new Country();

        $country->name = $request->input('name');
        $country->user_id = Auth::id();
        //$role->display_name = $request->input('display_name');

        //$role->description = $request->input('description');

        $country->save();


        // foreach ($request->input('permission') as $key => $value) {

        //     $role->attachPermission($value);

        // }

        return redirect()->route('country.index')->with('success','Country created successfully');
    }

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $country = Country::find($id);

        $rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")

            ->where("permission_role.role_id",$id)

            ->get();


        return view('country.show',compact('country','rolePermissions'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $country = Country::find($id);

        $permission = Permission::get();


        $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)

            ->lists('permission_role.permission_id','permission_role.permission_id');


        return view('country.edit',compact('country','permission','rolePermissions'));

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


        $country = Country::find($id);

        $country->name = $request->input('name');

        $country->save();


        // DB::table("permission_role")->where("permission_role.role_id",$id)

        //     ->delete();


        // foreach ($request->input('permission') as $key => $value) {

        //     $role->attachPermission($value);

        // }


        return redirect()->route('country.index')

                        ->with('success','Country updated successfully');

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
        Country::where('id',$id)->delete();

        return redirect()->route('country.index')

                        ->with('success','Country deleted successfully');

    }

}