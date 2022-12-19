<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;
    protected $table = 'dogs';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $fillable = [
        'name',
        'url_foto',
        'description',
    ];

    public function perroCandidato()
    {
        return $this->hasMany(Interaccion::class, 'Perro_candidato_id');
    }

    public function perroInteresado()
    {
        return $this->hasMany(Interaccion::class, 'Perro_interesado_id');
    }
}
