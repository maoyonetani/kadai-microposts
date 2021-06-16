{{--card.blade.phpはプロフィール--}}

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user"></i>      {{ $user->name }}</h3>
    </div>
    <div class="card-body">
        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
        <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
        <p>
        <h5 class="card-title"><i class="fas fa-user-circle"></i> age:     {{ $user->age }}</h5>
        <p>
        <h5 class="card-title"><i class="fas fa-map-marker-alt"></i> area:     {{ $user->area }}</h5>
        <p>
        <h5 class="card-title"><i class="fas fa-align-justify"></i> profile:     {{ $user->profile }}</h5>
    </div>
</div>
{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button')


