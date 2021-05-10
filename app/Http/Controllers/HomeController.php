<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trn_kakeibo;

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
        // 当月のデータを返す
        $this_month = date('Y-m');
        $trn_kakeibo = $this->getTargetMonthData('1', $this_month);
        
        return view('home', ["trn_kakeibo" => $trn_kakeibo]);
    }

    /**
     * 対象kakeiboの対象月のデータを取得する
     *
     * @return 
     */
    public function getTargetMonthData($kakeibo_id, $month)
    {
        // kakeibo一覧を取得する
        $trn_kakeibo = Trn_kakeibo::where('kakeibo_id', $kakeibo_id)
            ->where('date', 'like', "$month%")
            ->orderBy('id', 'asc')
            ->get();

        return $trn_kakeibo;
    }

    /**
     * 対象kakeiboのユーザーを取得する
     *
     * @return 
     */
    public function getKakeiboUsers($kakeibo_id)
    {
        
    }

    /**
     * 対象kakeiboの当月のユーザーごとの出費合計を取得する
     *
     * @return 
     */
    public function getSumPriceByUsers($kakeibo_id, $users)
    {
        
    }




}
