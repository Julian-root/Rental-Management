<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\Permission;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Utilisateurs extends Component
{
    // Gestion de la pagination au niveau du Dashboard
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    // Gestion du switch entre les différentes bloc-page de l'utilisateur
    public $currentPage = PAGELIST;
    public $newUser = [];
    public $editUser = [];
    public $rolePermissions = [];

    // Gestion de la validation des données au niveau des entrées du formulaire
    public function rules(){
        if($this->currentPage == PAGEEDITFORM){
            return [
                'editUser.nom' => 'required',
                'editUser.prenom' => 'required',
                'editUser.email' => ['required', 'email', Rule::unique("users", "email")->ignore($this->editUser['id']) ] ,
                'editUser.telephone1' => ['required', 'numeric', Rule::unique("users", "telephone1")->ignore($this->editUser['id']) ]  ,
                'editUser.pieceIdentite' => ['required'],
                'editUser.sexe' => 'required',
                'editUser.numeroPieceIdentite' => ['required', Rule::unique("users", "pieceIdentite")->ignore($this->editUser['id']) ],
            ];
        }
        return [
            'newUser.nom' => 'required',
            'newUser.prenom' => 'required',
            'newUser.email' => 'required|email|unique:users,email',
            'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
            'newUser.pieceIdentite' => 'required',
            'newUser.sexe' => 'required',
            'newUser.numeroPieceIdentite' => 'required|unique:users,numeroPieceIdentite',
        ];
    }
 
    // Gestion de l'affichage de la page index de livewire et Précision du layout à utiliser
    public function render()
    {
        Carbon::setLocale("fr");
        
        return view('livewire.utilisateurs.index', [
            "users" => User::latest()->paginate(4)
        ])
        ->extends('layouts.master')
        ->section('content');    
    }

    // Affichage de la page d'ajout des utilisateurs
    public function goToAddUser() {
        $this->currentPage = PAGECREATEFORM;
    }

    //Affichage de la page de listage des utilisateurs
    public function goToListUser() {
        $this->currentPage = PAGELIST;
        $this->editUser = [];
    }
    
    // Affichage de la page d'édition des utilisateurs , des Roles et Permissions
    public function goToEditUser($id) {
        $this->editUser = User::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;

        $this->populateRolePermissions();
    } 

    // Rangement des informations crées par l'utilisateur
    public function addUser() {
        // Vérifier que les informations de l'utilisateurs sont correctes
        $validationAttributes = $this->validate();

        $validationAttributes["newUser"]["password"] = Hash::make(DEFAULTPASSWORD);

        // Ajouter un nouvel utilisateur
        User::create($validationAttributes["newUser"]);

        $this->newUser = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur créé avec succès!"]);
    }

    // Rangement des informations éditées par l'utilisateur
    public function updateUser() {
        // Vérifier que les informations de l'utilisateurs sont correctes
        $validationAttributes = $this->validate();

        User::find($this->editUser["id"])->update($validationAttributes["editUser"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur mis à jour avec succès!"]);    
    }

    // Suppression d'un utilisateur 
    public function confirmDelete($id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $id de la liste des utilisateurs. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "user_id" => $id
            ]
        ]]);
    }

    public function deleteUser($id){
        User::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur supprimé avec succès!"]);
    }

    // Rénitialisation du mot de passe de l'utilisateur

    public function confirmPwdReset(){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de réinitialiser le mot de passe de cet utilisateur. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning"
        ]]);
    }

    public function resetPassword(){

        User::find($this->editUser["id"])->update(["password"=> Hash::make(DEFAULTPASSWORD)]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Mot de passe utilisateur réinitialisé avec succès!"]);
    }

    public function populateRolePermissions(){

        $mapForCB = function($value){
            return $value["id"];
        };

        // Affichage Roles
        $this->rolePermissions["roles"] = [];

        $roleIds = array_map($mapForCB, User::find($this->editUser["id"])->role->toArray()); // [1, 2, 4]

        foreach(Role::all() as $role){
            if(in_array($role->id, $roleIds)){
                array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nom, "active"=>true]);
            }else{
                array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nom, "active"=>false]);
            }
        }

        // Affichage Permissions
        $this->rolePermissions["permissions"] = [];

        $permissionIds = array_map($mapForCB, User::find($this->editUser["id"])->permission->toArray()); // [1, 2, 4]

        //dump(Permission::all());
        foreach(Permission::all() as $permission){
            if(in_array($permission->id, $permissionIds)){
                array_push($this->rolePermissions["permissions"], ["permission_id"=>$permission->id, "permission_nom"=>$permission->nom, "active"=>true]);
            }else{
                array_push($this->rolePermissions["permissions"], ["permission_id"=>$permission->id, "permission_nom"=>$permission->nom, "active"=>false]);
            }
        }

        // la logique pour charger les roles et les permissions
    }

     
    // Update Roles and Permissions 
    public function updateRoleAndPermissions() {
        DB::table("role_utilisateurs")->where("user_id", $this->editUser["id"])->delete(); 
        DB::table("permission_utilisateurs")->where("user_id", $this->editUser["id"])->delete();
        
        foreach($this->rolePermissions["roles"] as $role) {
            if($role["active"]) {
                User::find($this->editUser["id"])->role()->attach($role["role_id"]);
            }
        }

        foreach($this->rolePermissions["permissions"] as $permission) {
            if($permission["active"]) {
                User::find($this->editUser["id"])->permission()->attach($permission["permission_id"]);
            }
        }
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Roles et permissions mis à jour avec succès!"]);
        
    }

    

    

    

}
