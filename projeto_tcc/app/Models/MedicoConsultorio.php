<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicoConsultorio extends Model
{
    use HasFactory;

    protected $table = 'tbmedicoconsultorio';

    protected $primaryKey = 'meccodigo';

    protected $fillable = [
        'concodigo',
        'medcodigo'
    ];

    public $timestamps = false;

    public function consultorio() {
        return $this->belongsTo(Consultorio::class, 'concodigo', 'concodigo');
    }

    public function medico() {
        return $this->belongsTo(Medico::class, 'medcodigo', 'medcodigo');
    }
}
