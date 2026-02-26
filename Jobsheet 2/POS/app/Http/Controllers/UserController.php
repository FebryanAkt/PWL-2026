<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user($id, $name){
        return 'User ke-'.$id." Dengan nama ".$name;
    }
}
