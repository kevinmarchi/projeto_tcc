<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'tbavaliacao';

    protected $primaryKey = 'avacodigo';

    protected $fillable = [
        'avadescricao',
        'avanota',
        'cnscodigo'
    ];

    public $timestamps = false;

    public function consulta() {
        return $this->belongsTo(Consulta::class, 'cnscodigo', 'cnscodigo');
    }
}
