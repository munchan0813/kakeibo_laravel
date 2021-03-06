<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trn_kakeibo;


class KakeiboController extends Controller
{

    // 登録画面を表示する
    public function create() {
        return view('kakeibo.create');
    }

    // kakeibo詳細情報を登録する
    public function add(Request $request) {

        $trn_kakeibo = new Trn_kakeibo();
        $trn_kakeibo->kakeibo_id = $request->kakeibo_id;
        $trn_kakeibo->date = $request->date;
        $trn_kakeibo->user_id = $request->user_id;
        $trn_kakeibo->category = $request->category;
        $trn_kakeibo->price = $request->price;
        $trn_kakeibo->remarks = $request->remarks;
        
        $trn_kakeibo->save();

        return view('kakeibo.create');
    }

}