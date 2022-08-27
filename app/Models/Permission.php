<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function user() {
        return $this->belongsToMany(User::class,"permission_utilisateurs", "permission_id", "user_id");
    }
}
