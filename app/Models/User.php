<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'pieceIdentite',
        'numeroPieceIdentite',
        'telephone1',
        'telephone2',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function paiement() {
        return $this->hasMany(Paiement::class);
    }

    public function role() {
        return $this->belongsToMany(Role::class,"role_utilisateurs", "user_id", "role_id");
    }

    public function permission() {
        return $this->belongsToMany(Permission::class,"permission_utilisateurs", "user_id", "permission_id");
    }
    
    /* Authentificate Role Users */

    public function hasRole($role) {
        return $this->role()->where("nom", $role)->first() !== null;
    }

    public function hasManyRoles($roles) {
        return $this->role()->whereIn("nom", $roles)->first() !== null;
    }

    public function getAllRoleNamesAttribute() {
        return $this->role->implode("nom", '|');
    }
}
