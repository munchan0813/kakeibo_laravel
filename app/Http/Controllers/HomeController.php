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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // kakeibo一覧を取得する
        $trn_kakeibo = Trn_kakeibo::where('kakeibo_id', '1');
        $error = array();

        return view('home', ["trn_kakeibo" => $trn_kakeibo, "error" => $error]);
    }
}
