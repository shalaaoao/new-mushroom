<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TurnCardBetOrder extends Model {
    protected $dates = ['deleted_at'];
    protected $table = 'turn_card_bet_order';
    protected $guarded = ['id'];
}
