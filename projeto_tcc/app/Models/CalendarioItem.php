<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioItem extends Model
{
    use HasFactory;

    protected $table = 'tbcalendarioitem';

    protected $primaryKey = 'caicodigo';

    protected $fillable = [
        'calcodigo',
        'caidata'
    ];

    public $timestamps = false;

    public function calendario() {
        return $this->belongsTo(Calendario::class, 'calcodigo', 'calcodigo');
    }
}
