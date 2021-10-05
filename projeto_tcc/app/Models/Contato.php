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
        'cntativo',
        'cntdescricao',
        'cntpreferencial',
        'usucodigo'
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'usucodigo', 'usucodigo');
    }
}
