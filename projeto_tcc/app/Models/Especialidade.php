<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;

    protected $table = 'tbespecialidade';

    protected $primaryKey = 'espcodigo';

    protected $fillable = [
        'espnome'
    ];

    public $timestamps = false;
}
