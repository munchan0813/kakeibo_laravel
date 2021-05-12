<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trn_kakeibo;
use App\Mst_kakeibo;
use App\Mst_user;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * HOMEのデフォルトは当月のデータを表示する。
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // ログインユーザーがkakeiboを持つ場合、kakeiboを出力する
        $user_name = Auth::user();

        $usersKakeibos = $this->getKakeiboOfLoginUser($user_name);

        // 当月のデータを返す
        $trn_kakeibo = "";
        if($usersKakeibos != ""){
            $this_month = date('Y-m');
            $trn_kakeibo = $this->getTargetMonthData('1', $this_month);
        }
        
        return view('home', ["trn_kakeibo" => $trn_kakeibo, "usersKakeibos" => $usersKakeibos]);
    }

    /**
     * ログインユーザーに紐づくkakeiboを取得する
     *
     * @return 
     */
    public function getKakeiboOfLoginUser($user_name)
    {
        // ユーザーIDを取得する
        $user_id = $this->getUsername($user_name);

        $res = Mst_kakeibo::where('user_id', $user_id)
            ->orderBy('kakeibo_id', 'asc')
            ->value('kakeibo_id','kakeibo_name');

        return $res;
    }

    /**
     * 対象kakeiboの対象月のデータを取得する
     *
     * @return 
     */
    public function getTargetMonthData($kakeibo_id, $month)
    {
        $res = Trn_kakeibo::where('kakeibo_id', $kakeibo_id)
            ->where('date', 'like', "$month%")
            ->orderBy('id', 'asc')
            ->get();

        return $res;
    }

    /**
     * 対象kakeiboのユーザーを取得する
     *
     * @return 
     */
    public function getKakeiboUsers($kakeibo_id)
    {
        $res = Mst_kakeibo::where('kakeibo_id', $kakeibo_id)
            ->value('user_id');

        return $res;
    }

    /**
     * user_idからuser_nameを取得する
     *
     * @return 
     */
    public function getUsername($user_id)
    {
        $res = Mst_user::where('user_id', $user_id)
            ->value('user_name');

        return $res;
    }

    /**
     * 対象kakeiboの当月のユーザーごとの出費合計を取得する
     *
     * @return 
     */
    public function getSumPriceByUsers($kakeibo_id, $users)
    {
        $res;

        return $res;   
    }

    // 後ほどきりわける
    public function createIndex() {

        return view('kakeibo.createKakeibo');
    }
    // kakeiboを登録する
    public function add(Request $request) {

        $mst_kakeibo = new Mst_kakeibo();
        $mst_kakeibo->kakeibo_id = $request->kakeibo_id;
        $mst_kakeibo->user_id = $request->user_id;
        $mst_kakeibo->kakeibo_password = $request->kakeibo_password;
        
        $mst_kakeibo->save();

        return view('home');
    }



}
