<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'tbagenda';

    protected $primaryKey = 'agencodigo';

    protected $fillable = [
        'agendescricao',
        'meccodigo',
        'calcodigo'
    ];

    public $timestamps = false;

    public function medicoconsultorio() {
        return $this->belongsTo(MedicoConsultorio::class, 'meccodigo', 'meccodigo');
    }

    public function calendario() {
        return $this->belongsTo(Calendario::class, 'calcodigo', 'calcodigo');
    }
}
