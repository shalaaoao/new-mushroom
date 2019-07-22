<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TurnCardGetLog extends Model {
    protected $dates = ['deleted_at'];
    protected $table = 'turn_card_get_log';
    protected $guarded = ['id'];
}
