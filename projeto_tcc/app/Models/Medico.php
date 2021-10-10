<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'tbmedico';

    protected $primaryKey = 'medcodigo';

    protected $fillable = [
        'medregistro',
        'usucodigo'
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'usucodigo', 'usucodigo');
    }
}
