<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'tbendereco';

    protected $primaryKey = 'endcodigo';

    protected $fillable = [
        'endlogradouro',
        'endnumero',
        'endcomplemento',
        'cidcodigo'
    ];

    public $timestamps = false;

    public function cidade() {
        return $this->belongsTo(Cidade::class, 'cidcodigo', 'cidcodigo');
    }
}
