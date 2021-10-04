<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'tbestado';

    protected $primaryKey = 'estcodigo';

    protected $fillable = [
        'estnome',
        'estuf'
    ];

    public $timestamps = false;

    public function cidade() {
        return $this->hasMany(Cidade::class, 'estcodigo', 'estcodigo');
    }
}
