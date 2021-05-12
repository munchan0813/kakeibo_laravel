<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Trn_kakeibo extends Model
{
    protected $fillable = ['kakeibo_id','date', 'payer', 'category', 'price', 'remarks'];
    protected $table = 'trn_kakeibo';
}