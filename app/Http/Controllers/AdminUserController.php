<?php

namespace App\Http\Controllers;

use Laravel\Fortify\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        if($role === 'Admin')
        {
            $users = User::orderBy('id')->paginate(10);
            return view('admin.user.list_users', compact(['users', 'role']));
        }

        $message = 'Đây là chức năng của tài khoản quyền Admin ! Bạn đang đăng nhập tài khoản quyền '.$role;
        return view('admin.user.list_users', compact(['message', 'role']));
    }

    public function addUserPage()
    {
        $role = Auth::user()->roles;
        if($role === 'Admin')
        {
            return view('admin.user.add_users', compact(['role']));
        }

        $message = 'Đây là chức năng của tài khoản quyền Admin ! Bạn đang đăng nhập tài khoản quyền '.$role;
        return view('admin.user.add_users', compact(['message', 'role']));
    }

    public function addUser(Request $request)
    {
        $role = Auth::user()->roles;
        $messages = [
            'name.required' => 'Bạn phải nhập tên của user !',
            'email.required' => 'Bạn phải nhập email của user !',
            'email.unique:users' => 'Email này đã được sử dụng',
            'password.required' => 'Bạn phải nhập password của user !',
        ];

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', new Password],
        ], $messages)->validate();

        if ($role === 'Admin') {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'roles' => $request->roles,
            ]);
        }

        $users = User::orderBy('id')->paginate(10);
        return view('admin.user.list_users', compact(['users', 'role']));
    }

    public function editUserPage($id)
    {
        $role = Auth::user()->roles;
        if($role === 'Admin')
        {
            $user = User::where('id', $id)->first();
            return view('admin.user.edit_users', compact(['user', 'role']));
        }

        $message = 'Đây là chức năng của tài khoản quyền Admin ! Bạn đang đăng nhập tài khoản quyền '.$role;
        return view('admin.user.edit_users', compact(['message', 'role']));
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

        if($role === 'Admin') {
            $user_edit = User::where('id', $id)->update([
                'name' => $request->name,
                'roles' => $request->roles,
                'email' => $request->email,
            ]);
        }

        $user = User::where('id', $id)->first();
        return view('admin.user.edit_users', compact(['user', 'role']));
    }
}
