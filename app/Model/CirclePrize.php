<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CirclePrize extends Model {
    protected $dates = ['deleted_at'];
    protected $table = 'circle_prize';
    protected $guarded = ['id'];
}
