<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function listUsers()
    {
        $role = Auth::user()->roles;
        if($role == '1')
        {
            $users = User::orderBy('id')->paginate(10);
            return view('admin.user.list_users', compact(['users', 'role']));
        }
        else
        {
            $message = 'Đây là chức năng của tài khoản admin ! Bạn đang đăng nhập tài khoản nhân viên';
            return view('admin.user.list_users', compact(['message', 'role']));
        }
    }

    public function editUserPage($id)
    {
        $role = Auth::user()->roles;
        if($role == '1')
        {
            $user = User::where('id', $id)->first();
            return view('admin.user.edit_users', compact(['user', 'role']));
        }
        else
        {
            $message = 'Đây là chức năng của tài khoản admin ! Bạn đang đăng nhập tài khoản nhân viên';
            return view('admin.user.edit_users', compact(['message', 'role']));
        }
    }

    public function editUser($id, Request $request)
    {
        $role = Auth::user()->roles;
        $messages = [
            'name.required' => 'Bạn phải nhập tên của user !',
            'email.required' => 'Bạn phải nhập email của user !',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ], $messages)->validate();

        if($role == '1') {
            $user_edit = User::where('id', $id)->update([
                'name' => $request->name,
                'roles' => $request->roles,
                'email' => $request->email,
            ]);
        }

        $user = User::where('id', $id)->first();
        return view('admin.user.edit_users', compact(['user']));
    }
}
