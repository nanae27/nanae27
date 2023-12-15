<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function singnupForm(){
        return view('singnup');

    }
}
