<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTest extends Model {
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'user_test';
    protected $softDeleted = true;
    protected $guarded = ['id'];
}
