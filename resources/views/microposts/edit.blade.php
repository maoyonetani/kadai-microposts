@extends('layouts.app')

@section('content') 

    <h1>ツイート編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($micropost, ['route' => ['microposts.update', $micropost->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '2']) !!}
                </div>

                {!! Form::submit('Update', ['class' => 'btn btn-primary btn-block "style="color:white"']) !!}
                
            {!! Form::close() !!}
        </div>
    </div>

@endsection