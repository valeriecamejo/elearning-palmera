<form method="POST" action="{{ route('roles/create') }}">
  <script type="text/x-template" id="role-modal">
    <transition name="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-container">

            <div class="modal-header">
              <slot name="header">
              </slot>
            </div>

            <div class="modal-body">
              <slot name="body">
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
              </slot>
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
              <slot name="footer">
                <button type="button" class="btn btn-secondary" @click="$emit('close')">Cerrar</button>
                <button type="submit" class="btn btn-primary" @click="$emit('close')">Guardar</button>
              </slot>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </script>
</form>
