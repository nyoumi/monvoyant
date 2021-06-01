<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Voyant;
use App\Models\User;
use Chat;
use Illuminate\Support\Arr;
use App\Library\Services\Facturation;


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

    public function sendMessage(Facturation $facturationServiceInstance,Request $request){
        $status=1000;
        $response='message envoyé';
        $conversation_id=$request->conversation_id;
        $message=$request->message;
        //$sender=$request->sender;
        //$user = User::find($sender);
        $conversation = Chat::conversations()->getById($conversation_id);
        $user = Auth::user();
        $withdraw=$facturationServiceInstance->withdraw(3);
        if($withdraw["error"]==0){
            $message = Chat::message($message)
            ->from($user)
            ->to($conversation)
            ->send();
        }else{
            $status=$withdraw["error"];
            $response=$withdraw["message"];
           

        }
        $balance=$withdraw["balance"];

            return response()->json([
                'status' => $status,
                'message' =>$response ,
                'balance'=>$balance
            ]);
            

    }

    public function refresh(Request $request){
        $participant = Auth::user();
        //$messages = Chat::conversations()->getById($request->conversation_id);
        //$messages = Chat::conversations()->setParticipant($participant)->limit(5)->page(1)->get();

        $conversation = Chat::conversations()->getById($request->conversation_id);
        $messages = Chat::conversation($conversation)
        ->setParticipant($participant)
        ->limit(5)
        ->setPaginationParams(['sorting' => 'desc'])
        ->getMessages();
        $resultsMessages=[];
       // var_dump($messages ->lastPage);

         foreach ($messages as $key => $message) {
           
            if( !($message ->is_seen)){
                array_push($resultsMessages,$message);
                Chat::message($message)->setParticipant($participant)->markRead();
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
