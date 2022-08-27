<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    use HasFactory;

    public $fillable = [
        "nom", "noSerie", "type_article_id"
    ];

    public function typeArticle() {
        return $this->belongsTo(TypeArticle::class, "type_article_id", "id");
    }
    
    public function tarification() {
        return $this->hasMany(Tarification::class);
    }

    public function location() {
        return $this->belongsToMany(Location::class,"article_locations", "article_id", "location_id");
    }

    public function proprieteArticle() {
        return $this->belongsToMany(ProprieteArticle::class,"article_proprietes", "article_id", "propriete_article_id");
    }
}
