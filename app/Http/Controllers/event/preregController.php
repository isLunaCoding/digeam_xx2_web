<?php

namespace App\Http\Controllers\event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class preregController extends Controller
{
    public function index(){
        return view('event/prereg_index');
    }
}
