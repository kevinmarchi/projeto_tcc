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
        'endcodigo'
    ];

    public $timestamps = false;

    public function endereco() {
        return $this->belongsTo(Endereco::class, 'endcodigo', 'endcodigo');
    }

    public function consultoriohorario() {
        return $this->hasMany(ConsultorioHorario::class, 'concodigo', 'concodigo');
    }

    public function contato() {
        return $this->hasMany(Contato::class, 'concodigo', 'concodigo');
    }
}
