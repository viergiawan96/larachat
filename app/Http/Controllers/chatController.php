<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\message;
use App\Events\SendGlobalNotification;

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

        $nameUser = user::find($idForm)->name;

        $msgFill = Message::where(function($q) use ($idForm, $idTo ) {
            $q->where('from',$idForm);
            $q->where('to',$idTo);
        })->orWhere(function($q) use ($idForm, $idTo) {
            $q->where('to',$idForm);
            $q->where('from',$idTo);
        })
        ->get();

        return response()->json(compact('msgFill','nameUser'));
    }

    public function sendMsg(Request $request)
    {
        $message = new message;
        $message->from = $request->idFrom;
        $message->to = $request->idTo;
        $message->text = $request->text;
        $message->save();
        
        broadcast(new SendGlobalNotification($message));

        return response()->json($message);
    }
}
