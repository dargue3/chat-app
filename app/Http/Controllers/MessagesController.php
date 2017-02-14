<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use App\Events\MessageWasSent;

class MessagesController extends Controller
{

  /**
   * Make sure the user is logged in and authorized to view this conversation
   * 
   * @param  Request $request [description]
   * @return         
   */
  public function auth(Request $request)
  {
    $this->validate($request, ['username' => 'required|string']);

    $user = User::where('username', $request->username)->first();

    if (! $user) {
      $user = User::create(['username' => $request->username]);
    }

    return ['username' => $user->username];
  }


  /**
   * Fetch all of the logged-in user's conversations
   * 
   * @param  Request $request
   * @return   
   */
  public function all(Request $request)
  {
    return Message::all()->sortBy('created_at')->values();
  }


  /**
   * Send a message to a given person
   * 
   * @param  Request $request 
   * @return         
   */
  public function send(Request $request)
  {
    $this->validate($request, [
      'sender' => 'required|string',
      'message' => 'required|string',
    ]);

    $message = Message::create([
      'from'    => $request->sender,
      'message' => $request->message,
    ]);

    event(new MessageWasSent($message));

    return $message;
  }
}
