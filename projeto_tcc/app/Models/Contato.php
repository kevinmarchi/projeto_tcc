<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $table = 'tbcontato';

    protected $primaryKey = 'cntcodigo';

    protected $fillable = [
        'cntdescricao',
        'cnttipo',
        'cntpreferencial',
        'usucodigo',
        'concodigo',
        'cntativo'
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'usucodigo', 'usucodigo');
    }

    public function consultorio() {
        return $this->belongsTo(Consultorio::class, 'concodigo', 'concodigo');
    }
}
