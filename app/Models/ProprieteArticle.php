<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProprieteArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'estObligatoire',
        'type_article_id',
    ];

    public $timestamps = false;

    public function typeArticle() {
        return $this->belongsTo(TypeArticle::class, "type_article_id", "id");
    }

    public function article() {
        return $this->belongsToMany(Article::class,"article_proprietes", "propriete_article_id", "article_id");
    }
}
