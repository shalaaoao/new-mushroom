<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model {
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'users';
    protected $softDeleted = true;
    protected $guarded = ['id'];
}