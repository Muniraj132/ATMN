<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/recruitment/dashboard';

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
        return Validator::make($data, [
            'username' => ['required', 'string','regex:/^\S*$/u', 'max:255','min:8','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $requestforstaff = $data['requestforstaff'] ?? 'N';
        $requeststaffdistrict = $data['requeststaffdistrict'] ?? '';
        if($requestforstaff == "Y"){
            // $bodyContent = [
            //                 'toFirstName' => $data['username'],
            //                 'toemail'   => $data['email'],
            //             ];
            // $email = "atmn@cmalliance.com";
            // try {
            //     \Mail::to($email)->send(new \App\Mail\RequestStaffMail($bodyContent));
            //     } 
            //     catch (\Exception $e) {
            // }
        }
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'requestforstaff' => $requestforstaff,
            'requeststaffdistrict' => $requeststaffdistrict,
        ]);
    }
}
