<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function listUsers()
    {
        $users = User::orderBy('id')->paginate(10);
        return view('admin.user.list_users', compact(['users']));
    }

    public function editUserPage($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.user.edit_users', compact(['user']));
    }

    public function editUser($id, Request $request)
    {
        $messages = [
            'name.required' => 'Bạn phải nhập tên của user !',
            'email.required' => 'Bạn phải nhập email của user !',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ], $messages)->validate();

        $user_edit = User::where('id', $id)->update([
            'name' => $request->name,
            'roles' => $request->roles,
            'email' => $request->email,
        ]);

        $user = User::where('id', $id)->first();
        return view('admin.user.edit_users', compact(['user']));
    }
}
