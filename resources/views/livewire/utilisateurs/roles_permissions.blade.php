<div class="card card-primary">
    <div class="card-header d-flex align-items-center">
      <h3 class="card-title flex-grow-1"><i class="fas fa-fingerprint fa-2x"></i> Roles & permissions</h3>
      <button class="btn bg-gradient-success" wire:click="updateRoleAndPermissions"><i class="fas fa-check"></i> Appliquer les modifications</button>
    </div>
    <div class="card-body">
      <div id="accordion">

        @foreach ($rolePermissions["roles"] as $role )
          <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title flex-grow-1">
                <a  data-parent="#accordion" href="#"  aria-expanded="true">
                    {{ $role["role_nom"] }}
                </a>
                </h4>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">

                    <input type="checkbox" class="custom-control-input" wire:model.lazy="rolePermissions.roles.{{ $loop->index }}.active"
                    @if($role["active"]) checked @endif
                        id="customSwitch {{ $role['role_id'] }}">
                    <label class="custom-control-label" for="customSwitch {{ $role['role_id'] }}"> {{ $role["active"]? "Activé" : "Désactivé" }}</label>
                </div>
            </div>
          </div>
        @endforeach
      
      </div>   
    </div>
</div>

<div class="p-3">
  <table class="table table-bordered">
      <thead>
          <th>Permissions</th>
          <th></th>
      </thead>
      <tbody>
        @foreach ($rolePermissions["permissions"] as $permission )
          <tr>
              <td>{{ $permission["permission_nom"] }}</td>
              <td>
                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" class="custom-control-input" wire:model.lazy="rolePermissions.permissions.{{ $loop->index }}.active"
                    @if($permission["active"]) checked @endif
                        id="customSwitchPermission {{ $permission['permission_id'] }}">
                    <label class="custom-control-label" for="customSwitchPermission {{ $permission['permission_id'] }}"> {{ $permission["active"]? "Activé" : "Désactivé" }}</label>
                  </div>
              </td>
          </tr>
        @endforeach  
      </tbody>

  </table>
</div>