@extends('layouts.app')

@section('kakeibo.create')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('kakeibo.add') }}" method="post" class="form-horizontal">
            @csrf

            <!-- kakeibo_idを設定 -->
            <!-- 後ほど修正 -->
            <!-- <input type="hidden" name="kakeibo_id" value="1"> -->
            {{Form::hidden('kakeibo_id',1)}}
            <!-- 日付 -->
            <div class="form-group mb-3">
            {{Form::label('date','日付')}}
            <input type="date" name="date">
            </div>

            <!-- 支払い者 -->
            <!-- 後でログインユーザーがデフォルトになるようにする-->
            <div class="form-group pb-3">
                {{Form::label('payer','支払い者')}}

                    {{Form::select('payer', ['Saya' => 'Saya', 'Rin' => 'Rin'], 'ユーザーを選択して下さい', ['class' => 'form-control','id' => 'payer'])}}
            </div>

            <!-- カテゴリ -->
            <div class="form-group pb-3">
            {{Form::label('category','カテゴリ')}}
            {{Form::select('category', ['food' => '食費', 'dailystuff' => '日用品', 'electricity' => '電気', 'water' => '水道', 'gas' => 'ガス'], 'カテゴリを選択して下さい', ['class' => 'form-control','id' => 'category'])}}
            </div>

            <!-- 金額 -->
            <div class="form-group mb-3">
            {{Form::label('price','金額')}}
            {{Form::text('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => '金額'])}}
            </div>

            <!-- 備考 -->
            <div class="form-group mb-3">
            {{Form::label('remarks','備考')}}
            {{Form::textarea('remarks', null, ['class' => 'form-control', 'id' => 'remarks', 'placeholder' => '備考があれば記述して下さい', 'rows' => '3'])}}
            </div>

            <!--ボタンブロック-->
            <div class="form-group row">
            <div class="col-sm-12">
            {{Form::submit('登録', ['class'=>'btn btn-primary btn-block'])}}
            </div>

            </form>

        </div>
    </div>
</div>
@endsection
