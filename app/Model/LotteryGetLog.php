<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LotteryGetLog extends Model {
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'lottery_get_log';
    protected $softDeleted = true;
    protected $guarded = ['id'];
}