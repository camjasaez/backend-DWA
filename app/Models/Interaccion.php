<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interaccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'Perro_interesado_id',
        'Perro_candidato_id',
        'preferencia',
    ];

    public function perroCandidato()
    {
        return $this->belongsTo(Dog::class, 'Perro_candidato_id');
    }

    public function perroInteresado()
    {
        return $this->belongsTo(Dog::class, 'Perro_interesado_id');
    }
}
