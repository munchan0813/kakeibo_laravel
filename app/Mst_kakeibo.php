<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Mst_kakeibo extends Model
{
    protected $fillable = ['kakeibo_id','user_id', 'kakeibo_password'];
    protected $table = 'mst_kakeibo';
}