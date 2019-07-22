<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CircleGetLog extends Model {
    protected $dates = ['deleted_at'];
    protected $table = 'circle_get_log';
    protected $guarded = ['id'];
}
