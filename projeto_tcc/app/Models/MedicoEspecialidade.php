<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicoEspecialidade extends Model
{
    use HasFactory;

    protected $table = 'tbmedicoespecialidade';

    protected $primaryKey = 'mescodigo';

    protected $fillable = [
        'medcodigo',
        'espcodigo'
    ];

    public $timestamps = false;

    public function especialidade() {
        return $this->belongsTo(Especialidade::class, 'espcodigo', 'espcodigo');
    }

    public function medico() {
        return $this->belongsTo(Medico::class, 'medcodigo', 'medcodigo');
    }
}
