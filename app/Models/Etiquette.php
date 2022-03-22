<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Etiquette extends Model
{
    use HasFactory;

    /**
     * Nom de la table correspondante
     *
     * @var string
     */
    protected $table = 'etiquette';

    /**
     * Nom de la colonne de clé primaire
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

    /**
     * Cette fonction renvoie une collection contenant les plats rattachés à cette étiquette
     *
     * @return Collection
     */
    public function plats() {
        return $this->belongsToMany(Plat::class);
    }
}
