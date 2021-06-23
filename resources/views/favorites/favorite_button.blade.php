
    @if (Auth::user()->is_favoriting($micropost->id))
    
        {{-- お気に入りはずすボタンのフォーム --}}
        
        {{--favorites.unfavoriteは、User.phpのUserクラスのunfavorite--}}
        
        {!! Form::open(['route' => ['users.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="far fa-star"></i>', ['class' => "btn btn-secondary btn-sm",'type' => 'submit']) !!}
        {!! Form::close() !!}
    @else
        {{-- お気に入りボタンのフォーム --}}
        {!! Form::open(['route' => ['users.favorite', $micropost->id]]) !!}
            {!! Form::button('<i class="fas fa-star"></i>', ['class' => "btn btn-success btn-sm",'type' => 'submit']) !!}
        {!! Form::close() !!}
    @endif