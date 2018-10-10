<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{

    function __construct()
    {
         
         $this->middleware('permission:roles-list');
         $this->middleware('permission:roles-create', ['only' => ['create','store']]);
         $this->middleware('permission:roles-edit',   ['only' => ['edit','update']]);
         $this->middleware('permission:roles-delete', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function getData()
    {
        $roles = Role::all(); 
        return DataTables::of($roles)
            ->addColumn('action', function ($role) {
                if(auth()->user()->hasPermissionTo('roles-delete') && auth()->user()->hasPermissionTo('roles-edit') && auth()->user()->hasPermissionTo('roles-list')){
                      return '
                              <a class="btn btn-success btn-xs" role="button" href="'.route('roles.edit', $role->id) .'">
                                    <i class="fa fa-pencil"></i> Edit</a>

                               <a class="btn btn-info btn-xs" role="button" href="'.route('roles.show', $role->id) .'">
                               <i class="fa fa-search"></i>Show</a>

                               <form onsubmit= "return ConfirmDelete()" action="' .route('roles.destroy', $role->id). '" method="POST" accept-charset="UTF-8" style="display: inline;">
                                 <input name="_method" type="hidden" value="DELETE">
                                 <input name="_token" type="hidden" value="'.csrf_token().'"> 
                                 <button type="submit" value="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</button>
                                </form>'; 

                   }elseif (auth()->user()->hasPermissionTo('roles-delete')){
                     return '
                     <form onsubmit= "return ConfirmDelete()" action="' .route('roles.destroy', $role->id). '" method="POST" accept-charset="UTF-8" style="display: inline;">
                                 <input name="_method" type="hidden" value="DELETE">
                                 <input name="_token" type="hidden" value="'.csrf_token().'"> 
                                 <button type="submit" value="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</button>
                                </form>';

                  }elseif (auth()->user()->hasPermissionTo('roles-edit')){
                     return '
                     <a class="btn btn-success btn-xs" role="button" href="'.route('roles.edit', $role->id) .'">
                                    <i class="fa fa-pencil"></i> Edit</a>';
                 }elseif (auth()->user()->hasPermissionTo('roles-list')) {
                     return '
                     <a class="btn btn-info btn-xs" role="button" href="'.route('roles.show', $role->id) .'">
                               <i class="fa fa-search"></i>Show</a>';
                 }

            })
            ->addIndexColumn()
            ->make(true);
    }

    public function index()
    {
        
        return view('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::pluck('name','id'); //Permission::get();
        return view('roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')
                         ->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
         /*$permission = Permission::pluck('name','id'); //*/$permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
            //var_dump($rolePermissions); exit;
        return view('roles.edit',compact('role','permission','rolePermissions'));
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
            'name'       => 'required',
            'permission' => 'required',

        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')
                         ->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Role::find($id);
        $del->delete();
        //DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                         ->with('success','Role deleted successfully');
    }
}
