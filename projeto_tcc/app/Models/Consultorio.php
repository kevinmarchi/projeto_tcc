<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    use HasFactory;

    protected $table = 'tbconsultorio';

    protected $primaryKey = 'concodigo';

    protected $fillable = [
        'condescricao',
        'conativo',
    ];

    public $timestamps = false;
}
