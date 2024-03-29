<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    use HasFactory;

    protected $table = 'tbcalendario';

    protected $primaryKey = 'calcodigo';

    protected $fillable = [
        'calano',
        'calativo'
    ];

    public $timestamps = false;

    public function calendarioitem() {
        return $this->hasMany(CalendarioItem::class, 'calcodigo', 'calcodigo');
    }
}
