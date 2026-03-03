<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class technicien extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'numero',
        'specialite',
    ];
        public function reparations()
        {
            return $this->hasMany(Reparation::class, 'technicien_id');
        }
}
