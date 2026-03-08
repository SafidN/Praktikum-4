<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $table = 'matkuls';
// guarded kebalikan dari fillable
// guarded dengan array kosong berarti kita bisa mengisi seluruh kolom
// pada model
    protected $guarded = [];
}
