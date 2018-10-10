<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Yajra\DataTables\DataTables;
use App\UsersExport;

class UserController extends Controller
{

    public function __construct()
    {
         /*$this->middleware('permission:users-list');
         $this->middleware('permission:users-create', ['only' => ['create','store']]);
         $this->middleware('permission:users-edit',   ['only' => ['edit','update']]);
         $this->middleware('permission:users-delete', ['only' => ['destroy']]);*/
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function getData()
    {
        $users = User::orderBy('id','DESC')->get(); 
        return DataTables::of($users)
            ->addColumn('action', function ($role) {
                if(auth()->user()->hasPermissionTo('users-delete') && auth()->user()->hasPermissionTo('users-edit') && auth()->user()->hasPermissionTo('users-list')){
                      return '
                              <a class="btn btn-success btn-xs" role="button" href="'.route('users.edit', $role->id) .'">
                                    <i class="fa fa-pencil"></i> Edit</a>

                               <a class="btn btn-info btn-xs" role="button" href="'.route('users.show', $role->id) .'">
                               <i class="fa fa-search"></i>Show</a>

                               <form onsubmit= "return ConfirmDelete()" action="' .route('users.destroy', $role->id). '" method="POST" accept-charset="UTF-8" style="display: inline;">
                                 <input name="_method" type="hidden" value="DELETE">
                                 <input name="_token" type="hidden" value="'.csrf_token().'"> 
                                 <button type="submit" value="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</button>
                                </form>'; 

                   }elseif (auth()->user()->hasPermissionTo('users-delete')){
                     return '
                     <form onsubmit= "return ConfirmDelete()" action="' .route('users.destroy', $role->id). '" method="POST" accept-charset="UTF-8" style="display: inline;">
                                 <input name="_method" type="hidden" value="DELETE">
                                 <input name="_token" type="hidden" value="'.csrf_token().'"> 
                                 <button type="submit" value="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</button>
                                </form>';

                  }elseif (auth()->user()->hasPermissionTo('users-edit')){
                     return '
                     <a class="btn btn-success btn-xs" role="button" href="'.route('users.edit', $role->id) .'">
                                    <i class="fa fa-pencil"></i> Edit</a>';
                 }elseif (auth()->user()->hasPermissionTo('users-list')) {
                     return '
                     <a class="btn btn-info btn-xs" role="button" href="'.route('users.show', $role->id) .'">
                               <i class="fa fa-search"></i>Show</a>';
                 }

            })
            ->addIndexColumn()
            ->make(true);
    }

    public function index()
    {
        return view('users.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
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

            'name' => 'required',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|same:confirm-password',

            'roles' => 'required'

        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user  = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole'));
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

            'name' => 'required',

            'email' => 'required|email|unique:users,email,'.$id,

            'password' => 'same:confirm-password',

            'roles' => 'required'

        ]);

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                         ->with('success','User deleted successfully');
    }
}
