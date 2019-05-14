<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model {
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 's_user_member';
    protected $softDeleted = true;
    protected $guarded = ['id'];
}
