<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\OrderStarted;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    function index()
    {
        return view('forgot');
    }
    public function start(Request $request)
    {
        Mail::to($request->user())->send(new OrderStarted);
        return ("email sent");
    }
    public function ship()
    { 
        /*$user = User::where('email', request('email'))->first();
      
        return ("email sent"); */
        $user = User::find(1)->toArray();
      Mail::to($user['email'])->send(new OrderShipped());
      return view('login2');
    }
    public function change(Request $request)
    {
        $request->validate([
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(1)->update(['password'=> Hash::make($request->new_password)]);
   
        return back()->with('success', 'Mot de passe changé');

    }
    public function complete(Request $request)
    {
        return "complete";
    }
}
