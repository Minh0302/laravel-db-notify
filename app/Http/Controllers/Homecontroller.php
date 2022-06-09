<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\NewUserRegisterNotification;
use Illuminate\Notifications\Notification;

class Homecontroller extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function notify($id){
        if(auth()->user()){
            $user = User::where('id',$id)->first();
            auth()->user()->notify(new NewUserRegisterNotification($user));
        }
        dd('Successfully');
    }
    public function markasred($id){
        if($id){
            auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        }
        return back();
    }
}
