<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanModel extends Model
{
    use HasFactory;

    protected $table = 'data_jabatan';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
}
