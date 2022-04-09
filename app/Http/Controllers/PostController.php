<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        event(new TestEvent('abc@gmail.com'));
    }

    public function show(){
        
    }
}
