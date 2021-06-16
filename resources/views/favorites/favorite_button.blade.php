
    @if (Auth::user()->is_favoriting($micropost->id))
    
        {{-- お気に入りはずすボタンのフォーム --}}
        
        {{--favorites.unfavoriteは、User.phpのUserクラスのunfavorite--}}
        
        {!! Form::open(['route' => ['users.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-secondary btn-sm"]) !!}
        {!! Form::close() !!}
    @else
        {{-- お気に入りボタンのフォーム --}}
        {!! Form::open(['route' => ['users.favorite', $micropost->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-success btn-sm"]) !!}
        {!! Form::close() !!}
    @endif