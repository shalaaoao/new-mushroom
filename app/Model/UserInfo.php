<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInfo extends Model {
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'userinfo';
    protected $softDeleted = true;
    protected $guarded = ['id'];
}
