<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class chatController extends Controller
{
    public function getuser()
    {
        $user = user::all();
        return response()->json($user);
    }
}
