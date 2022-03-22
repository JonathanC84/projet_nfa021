<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;

    /**
     * Nom de la table correspondante
     *
     * @var string
     */
    protected $table = 'plat';

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
    protected $attributes = [
        // valeur par défaut du champ "description"
        'description' => "Origine :\n"
    ];

    /**
     * Cette fonction renvoie la catégorie auquelle ce plat est attaché
     *
     * @return Categorie
     */
    public function categorie() {
        // 'categorie_id' correspond à la colonne clé étrangère dans la table 'plat'
        //'id' correspond à la colonne clé primaire dans la table 'categorie'
        return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
    }

    /**
     * Cette fonction renvoie une collection contenant les étiquettes rattachées à ce plat
     *
     * @return Collection
     */
    public function etiquettes() {
        return $this->belongsToMany(Etiquette::class);
    }
}