<?php

namespace App\Http\Controllers;

use App\Models\IdNumber;
use App\Models\User;
use Illuminate\Http\Request;

class IdNumberController extends Controller
{
    public function index(){
        $data = User::find(1)->IdNumber;
        return $data;
        // $data = IdNumber::find(1)->user;
        // return $data;
    }
}
