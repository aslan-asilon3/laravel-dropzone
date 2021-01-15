<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dropzone extends Controller
{
    public function index(){
    	return view('dropzone');
    }

    public function success(Request $request){
    	$path = $request->file('file')->store('avatars');
        return $path;
    }
}
