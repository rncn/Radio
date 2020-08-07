<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    public function user() {

        return $this->belongsTo(\App\User::class, 'user_id', 'id');

    }
    //self::必須
    //Followされとるかな
    //第一prm フォローされているid 第二prm フォローしているid
    public static function isFollowed(Int $followed_user_id,Int $following_user_id) {
        return (bool) self::where('followed_user_id', $followed_user_id)
                                                        ->where('following_user_id', $following_user_id)
                                                                                    ->first(['id']);
    }
    //フォローしているかな
    //第一prm フォローしているid 第二prm フォローしているか確認先のid
    public static function isFollowing(Int $following_user_id,Int $followcheck_user_id) {
        return (bool) self::where('following_user_id', $followed_user_id)
                                                        ->where('following_user_id', $following_user_id)
                                                                                    ->first(['id']);
    }
    //フォロワー数
    public static function followersCounter(Int $user_id) {
        return (int) self::where('following_user_id', $user_id)->count();
    }
}
