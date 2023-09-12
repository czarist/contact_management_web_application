<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;
use DB;
use Pusher\Pusher;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    public function login()
    {
        if (!Auth::check()) {
            return view('pages.login');
        } else
            return redirect('/');
    }

    public function register()
    {
        if (!Auth::check()) {
            return view('pages.register');
        } else
            return redirect('/');
    }

    public function dashboard()
    {
        $users = User::all()->toArray();

        return view('dashboard', compact('users'));
    }

    public function user_infos($id)
    {
        $user = User::where('id', $id)->get()->toArray()[0];
        $loggedRoleUser = Auth::user()->toArray()['role'];

        if (Auth::user()->id == $id || $loggedRoleUser == '4') {
            return view('pages.user_infos', compact('user', 'id'));
        } else {
            return redirect('/');
        }
    }

    public function update_register(Request $request)
    {
        $user = User::find($request['id']);

        if ($request['email'] !== '') {
            $user->email = $request['email'];
        }

        if ($request['number'] !== '') {
            $user->phone = $request['phone'];
        }

        if ($request['password'] !== '') {
            $user->password = bcrypt($request['password']);
        }

        $user->save();
        return response()->json(['success' => 'User Info updated successfully!']);
    }

    public function save_register(Request $request)
    {
        $user = User::where('email', $request['email'])->first();

        if ($user) {
            return response()->json(['exists' => 'E-mail already registered']);
        } else {
            $user = new User;
            $user->name = 'default';
            $user->fname = $request['fname'];
            $user->lname = $request['lname'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->password = bcrypt($request['password']);
        }
        $user->save();
        return response()->json(['success' => 'User registered successfully']);
    }




    public function delete_user(Request $request)
    {
        $user = User::where('id', $request['id'])->first();
        if ($user) {
            $user->delete();
            return response()->json(['success' => 'Usuário excluído com sucesso']);
        } else {
            return response()->json(['error' => 'User not found']);
        }
    }


    public function user_login(Request $request)
    {

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) {
            $user = Auth()->user();
            return response()->json(['success' => 'Successfully Logged In']);
        } else {
            return response()->json(['error' => 'Something went wrong']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
