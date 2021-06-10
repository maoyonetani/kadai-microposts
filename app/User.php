<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    
    
    
    
    
    
    
    
    
    public function microposts()
    {
    //ユーザと投稿は、一対多の関係
    //このユーザが所有する投稿。（ Micropostモデルとの関係を定義）
    return $this->hasMany(Micropost::class);
    }
        
        
        
        
    //フォロー関係の場合、多対多の関係がどちらもUserに対するものなのでUserのModelに記述
    //     * このユーザがフォロー中のユーザ。（ Userモデルとの関係を定義）
    
    //$user->followings で $user が フォローしているUser達を取得
    public function followings()
    {
        //第一引数にser::classはModelクラスを指定
        //第二引数に中間テーブル（user_follow）を指定
        //第三引数には中間テーブルに保存されている自分のidを示すカラム名（user_id）
        //第四引数には中間テーブルに保存されている関係先のidを示すカラム名（follow_id）
        
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    

    
         //このユーザをフォロー中のユーザ。（ Userモデルとの関係を定義）
         //$user->followers も同様で $user をフォローしているUser達を取得可能
         
         public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    
    
    
    /**
     * $userIdで指定されたユーザをフォローする。
     *
     * @param  int  $userId
     * @return bool
     */
    
     public function follow($userId)
    {
        // すでにフォローしているかの確認
        $exist = $this->is_following($userId);
        // 対象が自分自身かどうかの確認
        $its_me = $this->id == $userId;

        if ($exist || $its_me) {
            // すでにフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }

    /**
     * $userIdで指定されたユーザをアンフォローする。
     *
     * @param  int  $userId
     * @return bool
     */
     
    public function unfollow($userId)
    {
        // すでにフォローしているかの確認
        $exist = $this->is_following($userId);
        // 対象が自分自身かどうかの確認
        $its_me = $this->id == $userId;

        if ($exist && !$its_me) {
            // すでにフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }

    /**
     * 指定された $userIdのユーザをこのユーザがフォロー中であるか調べる。フォロー中ならtrueを返す。
     *
     * @param  int  $userId
     * @return bool
     */
    public function is_following($userId)
    {
        // フォロー中ユーザの中に $userIdのものが存在するか
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    
    
    
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('microposts');
    }
    
    
    

    
    
}
