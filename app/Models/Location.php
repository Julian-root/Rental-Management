<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function statutLocation() {
        return $this->belongsTo(StatutLocation::class, "statut_location_id", "id");
    }

    public function user() {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function client() {
        return $this->belongsTo(Client::class, "client_id", "id");
    }

    public function paiement() {
        return $this->hasMany(Paiement::class);
    }

    public function article() {
        return $this->belongsToMany(Article::class,"article_locations", "location_id", "article_id");
    }

}
