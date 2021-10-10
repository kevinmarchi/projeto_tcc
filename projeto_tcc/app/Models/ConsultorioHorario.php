<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultorioHorario extends Model
{
    use HasFactory;

    protected $table = 'tbconsultoriohorario';

    protected $primaryKey = 'cohcodigo';

    protected $fillable = [
      'concodigo',
      'cohhorainicio',
      'cohhorafim',
      'cohtipo'
    ];

    public $timestamps = false;

    public function consultorio() {
        return $this->belongsTo(Consultorio::class, 'concodigo', 'concodigo');
    }
}
