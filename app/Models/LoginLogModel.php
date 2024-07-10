<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLogModel extends Model
{
    use HasFactory;

    protected $table = 'login_logs';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
}
