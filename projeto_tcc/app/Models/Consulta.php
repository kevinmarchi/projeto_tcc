<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'tbconsulta';

    protected $primaryKey = 'cnscodigo';

    protected $fillable = [
        'cnssituacao',
        'usucodigo',
        'aghcodigo'
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'usucodigo', 'usucodigo');
    }

    public function agendahorario() {
        return $this->belongsTo(AgendaHorario::class, 'aghcodigo', 'aghcodigo');
    }
}
