<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::orderBy('id', 'DESC')
            ->get();
        return view('pages.dashboard.user-index', ['users' => $users]);
    }

    public function create()
    {
        return view('pages.dashboard.user-create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password'   => ['required', 'string', 'min:6', 'confirmed'],
        ])->validate();

        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'admin_role' => '0',
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        if($user !== null)
            return redirect()->route('admin.user.index')->with('success', 'Successfully registered');

        return redirect()->route('admin.user.index')->withErrors('There was a problem sending the information. Please try again');
    }

    public function edit($user_id)
    {
        $user = User::where('id', $user_id)->first();
        return view('pages.dashboard.user-edit', ['user' => $user]);
    }

    public function update(Request $request, $user_id)
    {
        Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user_id]
        ])->validate();

        $user = User::where('id', $user_id)
            ->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'admin_role' => ($request->input('admin-access') == "on") ? '1' : '0',
                ]);
        if($user == true)
            return redirect()->route('admin.user.index')->with('success', 'User info successfully edited.');
        return redirect()->route('admin.user.index')->withErrors('There was a problem sending the information. Please try again');
    }

    public function delete($user_id)
    {
        $deleteUser = User::where('id', $user_id);
        $deleteUser->delete();
        if($deleteUser == true)
            return redirect()->route('admin.user.index')->with('success', 'User info successfully deleted.');
        return redirect()->route('admin.user.index')->withErrors('There was a problem sending the information. Please try again');
    }
}
