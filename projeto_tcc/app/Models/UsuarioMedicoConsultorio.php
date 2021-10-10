<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioMedicoConsultorio extends Model
{
    use HasFactory;

    protected $table = 'tbusuariomedicoconsultorio';

    protected $primaryKey = 'usacodigo';

    protected $fillable = [
        'usucodigo',
        'meccodigo'
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'usucodigo', 'usucodigo');
    }

    public function medicoConsultorio() {
        return $this->belongsTo(MedicoConsultorio::class, 'meccodigo', 'meccodigo');
    }
}
