<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\message;

class chatController extends Controller
{
    public function getuser()
    {
        $user = user::all();
        return response()->json($user);
    }

    public function filmsg(Request $request)
    {
        $idForm = $request->idForm;
        $idTo = $request->idTo;

        $msgFrom = message::where('from',$idForm)->where('to',$idTo)->select('id','text')->get();
        $msgTo = message::where('to',$idForm)->where('from',$idTo)->select('id','text')->get();
        $nameUser = user::find($idForm)->name;

        return response()->json(compact('msgFrom','msgTo','nameUser'));
    }
}
