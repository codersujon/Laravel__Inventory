<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $adminInfo = DB::table('users')->find($id);
        return view('admin.admin_profile', compact('adminInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $editData = DB::table('users')->find(Auth::user()->id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    /**
     * Update the Profile Content
     */
    public function update(Request $request)
    {
     
        $id =  Auth::user()->id;
        $user = DB::table('users')->find($id);
        $user->name = strtoupper($request->name);

        // For Image Name
        $customName ="";
        if($file = $request->file('profile_image')){

            $customName =  date('YmdHi').'.'.$file->getClientOriginalExtension();
            @unlink(public_path('upload/admin/images/'.$user->profile_image));
            $file->move(public_path('upload/admin/images/'),$customName);

        }else{
            $customName =  $user->profile_image;
        }
        
        // Query Builder
        DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->fullname,
                'username' => $request->username,
                'email' => $request->email,
                'profile_image' => $customName,
                'updated_at' => now()
        ]);

        $notification = array(
            "message" => "Admin Profile Updated Successfully!",
            "alert-type"=>"success"
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Change Password
     */

    public function changePassword()
    {
        return view('admin.admin_change_password');
    }

    /**
     * Update Password
     */

    public function updatePassword(Request $request){

        $validated =  $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        $hashedPassword = Auth::user()->password;

        if(Hash::check($request->oldPassword, $hashedPassword)){
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newPassword);
            $users->save();
            
            session()->flash(
                'message', 'Password Updated Successfully!',
                "alert-type","success"
            );
           
            return redirect()->back();
        }else{
            session()->flash(
                'message', 'Old Password is not match!', 
                "alert-type","danger"
            );

            return redirect()->back();
        }

    }
}
