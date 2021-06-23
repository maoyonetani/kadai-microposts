

@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
            
                @if (Auth::id() == $user->id)　
                    {{-- メッセージ編集ページへのリンク --}}
    {!! link_to_route('users.edit', 'edit profile', ['user' => $user->id], ['class' => 'btn btn-primary']) !!}
                @endif  
    
        </aside>
        <div class="col-sm-8">
            {{-- タブ --}}
            @include('users.navtabs')
            @if (Auth::id() == $user->id)
                {{-- 投稿フォーム --}}
                @include('microposts.form')
            @endif
            {{-- 投稿一覧 --}}
            @include('microposts.microposts')
        </div>
    </div>
@endsection
