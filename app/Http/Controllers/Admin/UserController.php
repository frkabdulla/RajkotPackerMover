<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\User;
use Illuminate\Support\Arr;
use App\Models\ImageUpload;
use Validator;
use Hash;

class UserController extends MainController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action',function($row){
                        $btn = '';
                            $btn = '<a href="'.route('users.show',[$row->id]).'" class="btn btn-info btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Show" title="Show"><i class="fa fa-eye"></i></a>';
                            $btn = $btn.' <a href="'. route('users.edit',[$row->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Edit" title="Edit"><i class="fa fa-edit"></i></a>';
                            $btn = $btn.' <button class="btn btn-danger btn-sm btn-flat remove-crud" data-id="'. $row->id .'" data-action="'. route('users.destroy',$row->id) .'"  data-toggle="tooltip" data-placement="top" data-original-title="Delete" title="Delete"> <i class="fa fa-trash"></i></button>';
                        return $btn;    
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|same:password_confirmation',
            // 'profile'=>'required',
        ]); 

        // if($request->hasFile('profile')) {
        //     $input['profile'] = ImageUpload::upload('public/userImage',$request->file('profile'));
        // }

        $input['password'] = Hash::make($input['password']);

        $input = Arr::except($input,array('confirm_password'));

        $user = User::create($input);

        notificationMsg('success',$this->crudMessage('add','User'));
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'password'=>'same:password_confirmation',
        ]); 

        $input = $request->all();

        // if($request->hasFile('profile')) {
        //     $input['profile'] = ImageUpload::upload('public/userImage',$request->file('profile'));
        // }

        if(isset($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('confirm_password'));
            $input = Arr::except($input,array('password'));    
        }

        $user->update($input);

        notificationMsg('success',$this->crudMessage('update','User'));
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(User $user)
    {
        $user->delete();
        
        notificationMsg('success',$this->crudMessage('delete','User'));
        return redirect()->route('users.index');
    }

    /**
     * Ajax status update user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function userChangeStatus(Request $request,$id)
    // {
    //     $user = User::find($id);
    //     $user->status = $request->status;
    //     $user->save();
    //     return response()->json(['success'=>'Post Published successfully.']); 
    // }
}
