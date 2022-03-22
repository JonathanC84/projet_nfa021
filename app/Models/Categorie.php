<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    /**
     * Nom de la table correspondante
     *
     * @var string
     */
    protected $table = 'categorie';

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
     * Cette fonction renvoie une collection contenant les plats rattachés à cette catégorie
     *
     * @return Collection
     */
    public function plats() {
        // 'categorie_id' correspond à la colonne clé étrangère de la table 'plat'
        // 'id' correspond à la colonne clé primaire de la table 'categorie'
        return $this->hasMany(Plat::class, 'categorie_id', 'id');
    }
}