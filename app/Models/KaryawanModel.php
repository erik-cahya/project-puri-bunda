<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'karyawan';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
}
