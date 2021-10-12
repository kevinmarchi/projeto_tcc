<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaHorario extends Model
{
    use HasFactory;

    protected $table = 'tbagendahorario';

    protected $primaryKey = 'aghcodigo';

    protected $fillable = [
        'agencodigo',
        'aghdescricao',
        'aghdata',
        'aghhorarioinicio',
        'aghhorariofim',
        'aghsituacao'
    ];

    public $timestamps = false;

    public function agenda() {
        return $this->belongsTo(Agenda::class, 'agencodigo', 'agencodigo');
    }
}
