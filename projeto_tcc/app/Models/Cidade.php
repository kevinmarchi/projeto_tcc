<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $table = 'tbcidade';

    protected $primaryKey = 'cidcodigo';

    protected $fillable = [
        'cidnome',
        'estcodigo'
    ];

    public $timestamps = false;

    public function estado() {
        return $this->belongsTo(Estado::class, 'estcodigo', 'estcodigo');
    }
}
