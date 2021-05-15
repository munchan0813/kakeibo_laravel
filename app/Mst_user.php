<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Mst_user extends Model
{
    protected $fillable = ['user_id','user_name'];
    protected $table = 'mst_user';
}