<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use \App\Following;
use Auth;

class UserController extends Controller
{
    public function detail($user)
    {
        //そのユーザー、存在します？
        if (! \App\User::where('name', $user)->exists()) {
            $error_data = ['message' => 'このユーザーは存在しません。削除されたか、IDが変更されたかも知れません。'];
            return response()->view('errors.error', ['error_data'=>$error_data], 404);
        }
        $userinfo = \App\User::where('name', $user)->first();
        //ログインしてますか
        if (Auth::check()){
            //フォローされているんでしょうか？教えてください、
            $userfollowed = \App\Following::isFollowed($userinfo->id,  Auth::user()->id);
        } else {
            $userfollowed = false;
        }
        //フォロワー数
        $followers = \App\Following::followersCounter($userinfo->id);
        return view('users.profile',[
            'userinfo'=>$userinfo,
            'userfollowed'=>$userfollowed,
            'followers'=>$followers
        ]);
    }
}
