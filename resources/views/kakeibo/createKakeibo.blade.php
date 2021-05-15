@extends('adminlte::page')

@section('title', 'kakeibo')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('kakeibo.addKakeibo') }}" method="post" class="form-horizontal">
            @csrf

            <!-- kakeibo_idを設定 -->
            <!-- 後ほど修正 -->
            <!-- <input type="hidden" name="kakeibo_id" value="1"> -->
            {{Form::hidden('kakeibo_id',1)}}

            <!-- kakeibo名 -->
            <div class="form-group pb-3">
             {{Form::label('kakeibo_name','kakeiboの名前をつけて下さい。')}}
            {{Form::text('kakeibo_name', null, ['class' => 'form-control', 'id' => 'kakeibo_name', 'placeholder' => '例）Saya and Rin', 'rows' => '3'])}}
            </div>

            <!-- カテゴリを設定する -->
            <div class="form-group pb-3">
            {{Form::label('category','カテゴリー')}}
            <p>追加するカテゴリーを半角カンマで区切って記入して下さい。</p>
            {{Form::text('category', null, ['class' => 'form-control', 'id' => 'category', 'placeholder' => 'カテゴリ', 'rows' => '1'])}}
            </div>

            <!-- Password -->
            <div class="form-group mb-3">
            {{Form::label('kakeibo_password','パスワードを設定して下さい。')}}
            <p>他のユーザーをkakeiboに招待する際に必要になります。</p>
            {{Form::text('kakeibo_password', null, ['class' => 'form-control', 'id' => 'kakeibo_password', 'placeholder' => 'password', 'rows' => '3'])}}
            </div>

            <!--ボタンブロック-->
            <div class="form-group row">
            <div class="col-sm-12">
            {{Form::submit('kakeiboを作成', ['class'=>'btn btn-primary btn-block'])}}
            </div>

            </form>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
