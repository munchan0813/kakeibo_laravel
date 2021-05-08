@extends('layouts.app')

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
                        <tr>
                            <td>1(金)</td>
                            <td>Saya</td>
                            <td>食費</td>
                            <td>1000円</td>
                            <td>特になし</td>
                        </tr>
                        <tr>
                            <td>1(金)</td>
                            <td>Rin</td>
                            <td>食費</td>
                            <td>2000円</td>
                            <td>特になし</td>
                        </tr>
                        <tr>
                            <td>2(土)</td>
                            <td>Saya</td>
                            <td>日用品</td>
                            <td>30円</td>
                            <td>特になし</td>
                        </tr>
                    </tbody>
                    </table>

                </div>
            </div>
            <!-- kakeibo新規登録--> 
            <a href="{{ url('/kakeibo/create') }}">kakeiboをつける</a>
        </div>
    </div>
</div>
@endsection
