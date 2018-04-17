<form method="POST" action="{{ route('roles/create') }}">
  @csrf
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Agregar Permisos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">

          <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Módulos') }}</label>
            <div class="col-md-8">
              <select name="modulo" class="custom-select">
                <option selected>Seleccionar</option>
                        @foreach ($modules as $module)
                  <option value={{ $module->id }}>{{ $module->name }}</option>
                        @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
          <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Permisos') }}</label>
            <div class="col-md-8">
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="show" id="inlineCheckbox1" value="ver" checked> Ver
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="create" id="inlineCheckbox2" value="crear"> Crear
                </label>
              </div>
              <div class="form-check form-check-inline disabled">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="edit" id="inlineCheckbox3" value="editar" > Editar
                </label>
              </div>
              <div class="form-check form-check-inline disabled">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="delete" id="inlineCheckbox3" value="eliminar" > Eliminar
                </label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button href="{{ url('roles/create') }}" type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
</form>