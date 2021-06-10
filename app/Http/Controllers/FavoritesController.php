<?php

namespace App\Http\Controllers;

class FavoritesController extends Controller
{
    /**
     * 投稿をお気に入りするアクション。
     *
     * @param  $id  相手ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザをお気に入りする
        \Auth::user()->favorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * ユーザをアンフォローするアクション。
     *
     * @param  $id  相手ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザをアンフォローする
        \Auth::user()->unvfavorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}