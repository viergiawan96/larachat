<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\message;
use App\Events\SendGlobalNotification;


class chatController extends Controller
{    

    public function getuser(Request $request)
    {
        $id = $request->id;
        $contacts = user::where('id', '!=', $id)->get();

        $unreadIds = message::select(\DB::raw('`from` as sender_id, count(*) as messages_count'))
            ->where('to', $id)
            ->where('read', true)
            ->groupBy('from')
            ->get(); 

        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });

        return response()->json($contacts);

    }

    public function filmsg(Request $request)
    {
        $idForm = $request->idForm;
        $idTo = $request->idTo;
        
        Message::where('to',$idTo)->where('from',$idForm)->update(['read' => false]);

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
