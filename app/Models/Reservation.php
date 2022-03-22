<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * Nom de la table correspondante
     *
     * @var string
     */
    protected $table = 'reservation';

    /**
     * Nom de colonne de la clé primaire
     *
     * @var string
     */
    protected $primaryKey = 'id';
    
    /**
     * Tableau contenant les valeurs par défaut de certains champs
     *
     * @var array
     */
    protected $attributes = [];
}