<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\ArticleProprietes;
use App\Models\TypeArticle;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class ArticleComp extends Component
{
    use WithPagination;

    public $search = "";
    public $filtreType = "", $filtreEtat = "";
    public $addArticle = [];
    public $proprietesArticles = null;

    protected $paginationTheme = "bootstrap"; 

    public function render()
    {
        Carbon::setLocale("fr");

        $articleQuery = Article::query();
        
        if($this->search != "") {
            $articleQuery->where("nom", "LIKE", "%". $this->search ."%")
                         ->orWhere("noSerie", "LIKE", "%". $this->search ."%"); 
        }

        if($this->filtreType != "") {
            $articleQuery->where("type_article_id", $this->filtreType);
        }

        if($this->filtreEtat != "") {
            $articleQuery->where("estDisponible", $this->filtreEtat);
        }

        return view('livewire.articles.index', [
            "articles" => $articleQuery->latest()->paginate(5),
            "typearticles" => TypeArticle::orderBy("nom", "ASC")->get()
            ])
            ->extends("layouts.master")
            ->section("content");
    }

    public function updated($property) {
        if($property == "addArticle.type") {
            $this->proprietesArticles = optional(TypeArticle::find($this->addArticle["type"]))->proprietes;
        }

    }

    public function showAddArticleModal(){
        $this->resetValidation();
        $this->addArticle = [];
        $this->proprietesArticles = [];
        $this->dispatchBrowserEvent("showModal");      
    }

    public function closeModal(){
        $this->dispatchBrowserEvent("closeModal");      
    }

    public function editArticle(Article $article){

    }

    public function confirmDelete(Article $article){
        
    }

    public function ajoutArticle(){

        $validateArr = [
            "addArticle.nom" => "string|min:3|required|unique:articles,nom",
            "addArticle.noSerie" => "string|max:50|min:3|required|unique:articles,noSerie",
            "addArticle.type" => "required",
        ];

        $customErrMessages = [];
        $propIds = [];

        foreach ($this->proprietesArticles?: [] as $propriete) {

            $field = "addArticle.prop.".$propriete->nom;

            $propIds[$propriete->nom] = $propriete->id;
            
            if($propriete->estObligatoire == 1){
                $validateArr[$field] = "required";
                $customErrMessages["$field.required"] = "Le champ <<".$propriete->nom.">> est obligatoire.";
            }else{
                $validateArr[$field] = "nullable";
            }


        }
        // Validation des erreurs
        $validatedData = $this->validate($validateArr, $customErrMessages);

        $article = Article::create([
            "nom" => $validatedData["addArticle"]["nom"],
            "noSerie" => $validatedData["addArticle"]["noSerie"],
            "type_article_id" => $validatedData["addArticle"]["type"],
        ]);

        $key = null;

        foreach($validatedData["addArticle"]["prop"]?: [] as $key => $prop) {
            ArticleProprietes::create([
                "article_id" => $article->id,
                "propriete_article_id" => $propIds[$key],
                "valeur" => $prop,
            ]);
        }

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article ajouté mise à jour avec succès!"]);
        $this->closeModal();
    }

}