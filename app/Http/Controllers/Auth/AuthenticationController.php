<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use App\Models\User;
use Hash, Auth;

class AuthenticationController extends Controller
{
    //

    public function login()
    {
        return view('login');
    }


    public function loginProcess(Request $request)
    {
        $rules = [
            "email" => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->intended('posts');
        }

        return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.'])->onlyInput('email');
    }


    public function register()
    {
        return view('register');
    }


    public function registerProcess(Request $request)
    {
        $rules = [
            "name" => 'required',
            "email" => 'required|unique:users',
            'password' => ['required', Password::min(8)->mixedCase()],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('/register')->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $userId = $this->createUser($validatedData);

        if ($userId > 0) return redirect()->back()->with('msg', json_encode(array("Account Information", "Account has been created successfully.", "success")));
        else return redirect()->back()->with('msg', json_encode(array("Account Information", "Something went wrong.", "danger")));
    }


    private function createUser(array $data)
    {
        return User::insertGetId([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function account(){
       return view('account');
    }

    public function updateProfilePicture(Request $request)
    {
        $data = $request->all();



    }
}
