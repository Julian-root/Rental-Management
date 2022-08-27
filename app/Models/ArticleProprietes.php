<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleProprietes extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = "article_proprietes";

    public $fillable = [
        "article_id", "propriete_article_id", "valeur"
    ];
}
