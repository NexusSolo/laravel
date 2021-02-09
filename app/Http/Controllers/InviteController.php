<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use App\Models\Role;
use App\Models\User;
use App\Notifications\InviteTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class InviteController extends Controller
{
  public function send_invite(Request $request) {
    $request->validate(['email' => 'required|email', 'role' => 'required']);

    $old = Invite::where('email', $request->email)->first();
    if ($old) $old->delete();
    
    $token = Str::random(20);
    
    Invite::create([
      'token' => $token,
      'invitor' => \Auth::user()->email,
      'role' => $request->input('role'),
      'email' => $request->input('email')
    ]);

    $url = URL::temporarySignedRoute(
      'invite-view', now()->addDays(5), ['token' => $token]
    );

    $status = FacadesNotification::route('mail', $request->input('email'))->notify(new InviteTeam($url));
    return back()->with(['status' => __('Invitation has just been sent to '.$request->email.' successfully')]);
  }

  public function invited($token) {
    $invite = Invite::where('token', $token)->first();
    return view('auth.invited', ['data'=>$invite]);
  }

  public function accept(Request $request) {
    $request->validate([
      'token' => 'required',
      'user_name' => 'required',
      'user_salt' => 'required',
      'password' => 'required|min:8|confirmed',
    ]);

    $invite = Invite::where('token', $request->token)->first();
    $invitor = User::where('email', $invite->invitor)->first();
    $user = User::create([
      'user_name' => $request->input('user_name'),
      'email' => $invite->email,
      'password' => Hash::make($request->input('password')),
      'master_account_id' => $invitor->id,
      'user_salt' => $request->input('user_salt'),
      'role_id' => $invite->role,
    ]);

    $invite->delete();

    \Auth::login($user);
    return redirect('/');
  }
}
