<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    function changePassPage()
    {
        return view('changePassword');
    }
    function changeNamePage()
    {
        return view('changeName');
    }
    function changeMailPage()
    {
        return view('changeMail');
    }
    function changepass(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
          ]);
  
          $user = Auth::user();
  
          if (!Hash::check($request->current_password, $user->password)) {
              return back()->with('error', 'Le mot de passe actuel ne correspond pas!');
          }
  
          $user->password = Hash::make($request->password);
          $user->save();
  
          return back()->with('success', 'Mot de passe changé avec succès!');
    }
    function changename(Request $request)
    {
        $request->validate([
            'name' => 'required|confirmed',
            'name_confirmation' => 'required',
          ]);
  
          $user = Auth::user();
  
          $user->name =$request->name;
          $user->save();
  
          return back()->with('success', 'Nom modifié avec succès!');
    }
    function changemail(Request $request)
    {
        $request->validate([
            'mail' => 'required|email|confirmed',
            'mail_confirmation' => 'required|email',
          ]);
  
          $user = Auth::user();
  
          $user->email =$request->mail;
          $user->save();
  
          return back()->with('success', 'Email modifié avec succès!');
    }
  
}
