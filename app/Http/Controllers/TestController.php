<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    function test(){
        $user = User::find(1);
        var_dump($user);
        return view('welcome', ['user' => $user]);
    }
}
