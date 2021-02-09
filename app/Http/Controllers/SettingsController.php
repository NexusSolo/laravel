<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use App\Models\Role;
use App\Models\User;
use App\Notifications\InviteTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
  public function settings() {
    return view('pages.settings');
  }
  public function team() {
    $pageConfigs = ['pageHeader' => true];
    $breadcrumbs = [
      ["link" => "settings", "name" => "Settings"],["name" => "Team"]
    ];
    $roles = Role::get();
    $user = User::with('role')->find(\Auth::id());
    $members = User::where('master_account_id', $user->master_account_id)->get();
    return view('pages.team',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs, 'roles'=>$roles, 'members'=>$members, 'user'=>$user]);
  }
}
