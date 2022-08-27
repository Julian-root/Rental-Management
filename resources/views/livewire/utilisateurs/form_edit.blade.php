<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'edition utilisateur</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    
  
    <form role="form" wire:submit.prevent="updateUser()">
      <div class="card-body">
          <div class="d-flex">
              <div class="form-group flex-grow-1 mr-2">
                  <label >Nom</label>
                  <input type="text" wire:model="editUser.nom" class="form-control @error('editUser.nom') is-invalid @enderror">

                  @error("editUser.nom")
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group flex-grow-1">
                  <label >Prenom</label>
                  <input type="text" wire:model="editUser.prenom" class="form-control @error('editUser.prenom') is-invalid @enderror">

                  @error("editUser.prenom")
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>

        <div class="form-group">
          <label >Sexe</label>
          <select class="form-control @error('editUser.sexe') is-invalid @enderror" wire:model="editUser.sexe">
              <option value="">---------</option>
              <option value="H">Homme</option>
              <option value="F">Femme</option>
          </select>
          @error("editUser.sexe")
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
        </div>

        <div class="form-group">
          <label >Adresse e-mail</label>
          <input type="text" class="form-control @error('editUser.email') is-invalid @enderror" wire:model="editUser.email">
          @error("editUser.email")
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
        </div>

        <div class="d-flex">
              <div class="form-group flex-grow-1 mr-2">
                  <label >Telephone 1</label>
                  <input type="text" class="form-control @error('editUser.telephone1') is-invalid @enderror" wire:model="editUser.telephone1">
                  @error("editUser.telephone1")
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group flex-grow-1">
                  <label >Telephone 2</label>
                  <input type="text" class="form-control" wire:model="editUser.telephone2">
              </div>
          </div>

      <div class="form-group">
          <label >Piece d'identité</label>
          <select class="form-control @error('editUser.pieceIdentite') is-invalid @enderror" wire:model="editUser.pieceIdentite">
              <option value="">---------</option>
              <option value="CNI">CNI</option>
              <option value="PASSPORT">PASSPORT</option>
              <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
          </select>
          @error("editUser.pieceIdentite")
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
                  <label >Numero de piece d'identité</label>
                  <input type="text" class="form-control @error('editUser.numeroPieceIdentite') is-invalid @enderror" wire:model="editUser.numeroPieceIdentite">
                  @error("editUser.numeroPieceIdentite")
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
        <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retouner à la liste des utilisateurs</button>
      </div>
    </form>
  </div>