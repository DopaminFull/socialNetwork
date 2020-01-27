<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Client;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['type'] == 'user') {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
        return Validator::make($data, [
            'companyName' => ['required', 'string', 'max:255'],
            'companyEmail' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'companyPassword' => ['required', 'string', 'min:8', 'required_with:companyPassword', 'same:c_password_confirmation'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    { }
    protected function register(Request $request)
    {

        $validator = $this->validator($request->input());
        if ($validator->fails())
            return redirect('register')->withErrors($validator)->withInput(['type' => $request->type]);
        if ($request->type == "user") {
            $client_id = Client::create(['full_name' => $request->name])->id;
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'profile_id' => 3,
                'client_company' => $client_id,
                'api_token' => Str::random(60),
            ]);
        } else {
            $company_id = Company::create([
                'type' => $request->typ,
                'sigle' => $request->companyName
            ])->id;
            User::create([
                'email' => $request->companyEmail,
                'password' => Hash::make($request->companyPassword),
                'profile_id' => 2,
                'client_company' => $company_id,
                'api_token' => Str::random(60),
            ]);
        }
        return redirect('login')->with('success', 'Account created successfully');
    }
}
