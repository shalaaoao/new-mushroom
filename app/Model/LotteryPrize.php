<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LotteryPrize extends Model {
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'lottery_prize';
    protected $softDeleted = true;
    protected $guarded = ['id'];
}