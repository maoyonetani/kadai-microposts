@extends('layouts.app')

@section('content')

    <h1>プロフィール編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('age', 'age:') !!}
                    {!! Form::text('age', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('area', 'area:') !!}
                    {!! Form::text('area', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('profile', 'profile:') !!}
                    {!! Form::text('profile', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('update', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection