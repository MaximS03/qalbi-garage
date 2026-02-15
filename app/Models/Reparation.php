<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    use HasFactory;

    protected $table = 'reparations';

    protected $fillable = [
        'vehicule_id',
        'technicien_id',
        'date_debut',
        'date_fin',
        'description',
    ];

    protected $casts = [
        'date_debut' => 'datetime',
        'date_fin' => 'datetime',
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicules::class);
    }

    public function technicien()
    {
        return $this->belongsTo(Technicien::class);
    }
}
