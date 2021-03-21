<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected $viewPrefix = "frontend.rise";
    public function index()
    {
        return view($this->viewPrefix.'.register');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        $rules = [
            'name' => 'required|max:255',
            'father_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'cnic' => 'required|string|max:255',
            'phone' => 'required|integer',
            'address' => 'required|string|max:255',
        ];

        if (config('recaptcha.enable')) {
            $rules['g-recaptcha-response'] = 'required|recaptcha';
        }

        return Validator::make($data, $rules);
    }



    public function sendEmail(Request $request)
    {
        $this->validator($request->all())->validate();

        $data["email"] = "admin@riseschool.com";
        $data["title"] = "RiseSchool: New Registration";
        $data["body"] = $request->all();
        $pdf = PDF::loadView($this->viewPrefix.'.pdf', $request->all());
        $pdf->setOptions(['isPhpEnabled' => true,'isRemoteEnabled' => true]);

        Mail::send($this->viewPrefix.'.emails.registerpdf', $data, function($message)use($data,$pdf) {
            $message->to($data["email"], $data["email"])->attachData($pdf->output(),'New Registration.pdf')
                ->subject($data["title"]);
        });
        return response()->json(['msg' => 'Entry Submitted']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole('user');
        return $user;
    }
}
