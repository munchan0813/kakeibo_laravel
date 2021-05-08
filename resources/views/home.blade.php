@extends('adminlte::page')

@section('title', 'kakeibo')

@section('content_header')
    <h1>kakeibo</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo date('Y/m');?></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- kakeibo一覧表示 -->

                    <?php foreach ($error as $value) { ?>
                        <?php print htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); ?> 
                    <?php } ?>

                    @if($trn_kakeibo == '')
                            <p>データがありません。</p>
                    @else
                    <table class="table table-striped">
                    <thead>
                        <tr><th scope="col">日付</th>
                            <th scope="col">支払い者</th>
                            <th scope="col">カテゴリ</th>
                            <th scope="col">金額</th>
                            <th scope="col">備考</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trn_kakeibo as $detail)
                        <tr>
                            <td>{{ $detail->date }}</td>
                            <td>{{ $detail->payer }}</td>
                            <td>{{ $detail->category }}</td>
                            <td>{{ $detail->price }}</td>
                            <td>{{ $detail->remarks }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    @endif

                    {{ $trn_kakeibo }}

                </div>
            </div>
            <!-- kakeibo新規登録--> 
            <a href="{{ url('/kakeibo/create') }}">kakeiboをつける</a>
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