<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Voyant;
use App\Models\User;
use Chat;
use Illuminate\Support\Arr;


class ChatController extends Controller
{
    public function index($id){
        $user = Auth::user();
        $voyant = Voyant::find($id);
        //$users = User::all();
        $users = User::role('Admin')->get();
        $participants=[];
        $roles = $user->getRoleNames();
        if (!in_array("Admin", $roles->toArray())) {
            array_push ( $participants , $user );
        }
       

        foreach ($users as $participant) {
            array_push ( $participants , $participant );

        }
        $data = ['title' => 'conversation_'.$user->name, 'voyant' =>$voyant->id,
         'client'=>$user->id,'identifier'=>$voyant->id.'_'.$user->id];

        //$users=$user;

        $conversation = Chat::createConversation($participants);
        $conversation->update(['data' => $data]);

        return View::make('chat')
        ->with('voyant', $voyant)
        ->with('conversation', $conversation)

        ->with('user_id', $user->id);

    }

    public function sendMessage(Request $request){

        $conversation_id=$request->conversation_id;
        $message=$request->message;
        $sender=$request->sender;
        //$user = User::find($sender);
        $conversation = Chat::conversations()->getById($conversation_id);
        $user = Auth::user();
        
        $message = Chat::message($message)
            ->from($user)
            ->to($conversation)
            ->send();

            return response()->json([
                'status' => 1000,
                'message' => 'message envoyé',
            ]);
            

    }

    public function refresh(Request $request){
        $participant = Auth::user();
        //$messages = Chat::conversations()->getById($request->conversation_id);
        //$messages = Chat::conversations()->setParticipant($participant)->limit(5)->page(1)->get();

        $conversation = Chat::conversations()->getById($request->conversation_id);
        $messages = Chat::conversation($conversation)->setParticipant($participant)->limit(5)->getMessages();
        $resultsMessages=[];
       // var_dump($messages ->lastPage);

         foreach ($messages as $key => $message) {
            if( !($message ->is_seen)){
                array_push($resultsMessages,$message);
            }
        } 
        //Chat::conversation($conversation)->setParticipant($participant)->readAll();

            return response()->json([
                'status' => 1000,
                'messages' =>$resultsMessages,
                "conversation"=>$request->conversation_id,
            ]);
            

    }

}
