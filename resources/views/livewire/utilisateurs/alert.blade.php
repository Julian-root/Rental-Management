<script>
  window.addEventListener("showSuccessMessage", event=>{
      Swal.fire({
              position: 'top-end',
              icon: 'success',
              toast:true,
              title: event.detail.message || "Opération effectuée avec succès!",
              showConfirmButton: false,
              timer: 5000
              }
          )
  })
</script>

<script>
  window.addEventListener("showConfirmMessage", event=>{
     Swal.fire({
      title: event.detail.message.title,
      text: event.detail.message.text,
      icon: event.detail.message.type,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuer',
      cancelButtonText: 'Annuler'
      }).then((result) => {
      
      if (result.isConfirmed) {
          if(event.detail.message.data){
              @this.deleteUser(event.detail.message.data.user_id)
          }
      }
      })
  })
</script>

{{-- <script>
  window.addEventListener("showConfirmMessage", event=>{
     Swal.fire({
      title: event.detail.message.title,
      text: event.detail.message.text,
      icon: event.detail.message.type,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuer',
      cancelButtonText: 'Annuler'
      }).then((result) => {
      
      if (result.isConfirmed) {
          if(event.detail.message.data){
              @this.deleteUser(event.detail.message.data.user_id)
          }
      }
      })
  })
</script> --}}

{{-- <script>
  window.addEventListener("showConfirmMessage", event=>{
     Swal.fire({
      title: event.detail.message.title,
      text: event.detail.message.text,
      icon: event.detail.message.type,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuer',
      cancelButtonText: 'Annuler'
      }).then((result) => {
            
      if (result.isConfirmed) {
          if(event.detail.message.data){
              @this.deleteUser(event.detail.message.data.user_id)
          }
          // @this.resetPassword()
      }
      })
  })
</script> --}}


{{-- <div>
    @if(session()->has("sucessAdd"))
        <div style=" background-color: rgb(118, 150, 118)" class=" alert alert-sucess">
          <h4>{{ session()->get("sucessAdd") }}</h4>
        </div>  
  @endif
</div>
      return redirect( route('admin.habilitations.users.index') )->back()->with('sucessUpdateRoleAndPermission', 'Un utilsateur a été ajouté avec succès');     


<div>
  @if(session()->has("sucessDelete"))
      <div style=" background-color: rgb(118, 150, 118)" class=" alert alert-sucess">
        <h4>{{ session()->get("sucessDelete") }}</h4>
      </div>  
@endif
</div>

<div>
  @if(session()->has("sucessEdit"))
      <div style=" background-color: rgb(118, 150, 118)" class=" alert alert-sucess">
        <h4>{{ session()->get("sucessEdit") }}</h4>
      </div>  
@endif
</div>
      return redirect( route('admin.habilitations.users.index') )->back()->with('sucessEdit', 'Un utilsateur a été mis à jour avec succès');


<div>
  @if(session()->has("sucessResetPassword"))
      <div style=" background-color: rgb(118, 150, 118)" class=" alert alert-sucess">
        <h4>{{ session()->get("sucessResetPassword") }}</h4>
      </div>  
@endif
</div>
      return redirect( route('admin.habilitations.users.index') )->back()->with('sucessResetPassword', ' Rénitialisation mot de passe utilisateur réussi avec succès');


<div>
  @if(session()->has("sucessUpdateRoleAndPermission"))
      <div style=" background-color: rgb(118, 150, 118)" class=" alert alert-sucess">
        <h4>{{ session()->get("sucessUpdateRoleAndPermission") }}</h4>
      </div>  
@endif
</div>
return redirect( route('admin.habilitations.users.index') )->back()->with('sucessUpdateRoleAndPermission', "L'accès de votre utilsateur a été mis à jour avec succès"); 
--}}