<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StrictTest extends Model {
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'strict_test';
    protected $softDeleted = true;
    protected $guarded = ['id'];
}
