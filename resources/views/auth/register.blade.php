@extends('layouts.auth')

@section('form')

<div class="register-box" style=" width: 515px; transform: translateY(50px); margin: 0 auto;">
    <div class="card card-outline card-primary">
      <div class="card-header text-center bg-dark">
        <a href="#" ><b style="font-weight:bold; color: hsl(53, 82%, 51%); font-size: 1.8em;">ADJILAN 'MODEL</b></a>
      </div>
      <div class="card-body" >
        <p class="login-box-msg text-dark bg-gray-light pt-3" style="border-radius: 8px 8px 0 0; font-size: 1.3em;"><b>Enregistrez-vous maintenant</b></p>
  
    <form style="margin: 0 auto; border-radius: 0 0 8px 8px ;" class="bg-gray-light p-3" method="POST" action="{{ route('register') }}" >
        @csrf
        
        <div class=" input-group mt-2 mb-3" >
                <input id="name" type="text"  placeholder="Nom" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
                @error('nom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                </div>
        </div>
        <div class=" input-group mt-2 mb-3">
            <input id="name" type="text" placeholder="Prenom" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
            @error('prenom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        
        <div class="input-group mb-3">
            <select class="form-control @error('sexe') is-invalid @enderror" name="sexe" value="{{ old('sexe') }}" required autocomplete="sexe" autofocus>
                <option value="">Sexe</option>
                <option value="H">Homme</option>
                <option value="F">Femme</option>
            </select>
            @error('sexe')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-venus-mars"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class=" col input-group mb-3">
                <input type="text" placeholder="Telephone 1" class="form-control @error('telephone1') is-invalid @enderror" name="telephone1" value="{{ old('telephone1') }}" required autocomplete="telephone1">
                @error('telephone1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
            </div>
            <div class=" col input-group mb-3">
                <input type="text" placeholder="Telephone 2" class="form-control" name="telephone2" value="{{ old('telephone2') }}" required autocomplete="telephone2">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
            </div>
        </div> 

        <div class="row">
            <div class=" col input-group mb-3">
                <select class="form-control @error('pieceIdentite') is-invalid @enderror" name="pieceIdentite" value="{{ old('pieceIdentite') }}" required autocomplete="pieceIdentite" autofocus>
                    <option value="">Piece d'identite</option>
                    <option value="CNI">CNI</option>
                    <option value="PASSPORT">PASSPORT</option>
                    <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                </select>
                @error('pieceIdentite')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-passport"></span>
                    </div>
                </div>
            </div>
            <div class="col input-group mb-3">
                <input type="text" placeholder="Numero Piece d'identité" class="form-control @error('numeroPieceIdentite') is-invalid @enderror" name="numeroPieceIdentite" value="{{ old('numeroPieceIdentite') }}" required autocomplete="numeroPieceIdentite">
                @error('numeroPieceIdentite')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-id-card"></span>
                    </div>
                </div>
            </div>
       </div>

        <div class="input-group mb-3">
                <input id="password" placeholder="Mot de passe" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                </div>
        </div>

        <div class="input-group mb-3">
                <input id="password-confirm" placeholder="Confirmer votre mot de passe" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                </div>
        </div> 

        <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms"  >
                <label for="agreeTerms">
                    <span class="text-dark">J'accepte les</span> <a href="#">conditions</a>
                </label>
              </div>
            </div>
            
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
            </div>
        </div>

        </form>
  
        <a href="{{ route('login') }}" class=" mb-4 text-center"><b>Vous etes déjà menbre</b></a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
@endsection
