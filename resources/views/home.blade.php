@extends('adminlte::page')

@section('title', 'kakeibo')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <button><</button>
                    <?php echo date('Y/m');?>
                    <button>></button>
                    </div>
                <div class="card-body">
                <!-- ユーザー毎にforeachで出せる様にする -->
                    <p>Saya:</p>
                    <p>Rin:</p>
                    <p>合計：</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">詳細</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- kakeibo一覧表示 -->
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

                </div>
            </div>


            <!-- kakeibo詳細新規登録--> 
            <a href="{{ url('/kakeibo/create') }}">kakeiboをつける</a></br>

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