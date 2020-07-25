<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class StaticpagesController extends Controller
{
    public function index(){
        return view('index');
    }
}
