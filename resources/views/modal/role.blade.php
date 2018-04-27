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
                    <select class="custom-select" required>
                      <option selected>Seleccionar</option>
                        @foreach ($modules as $module)
                          <option v-bind:title="{{ $module->id }}">{{ $module->name }}</option>
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
                    <input class="form-check-input" type="checkbox" name="show" id="ver" value="ver" v-model="checkedNames" v-bind:checkedNames="checkedNames" checked> Ver
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="create" id="crear" value="crear" v-model="checkedNames" v-bind:checkedNames="checkedNames"> Crear
                  </label>
                </div>
                <div class="form-check form-check-inline disabled">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="edit" id="editar" value="editar" v-model="checkedNames" v-bind:checkedNames="checkedNames"> Editar
                  </label>
                </div>
                <div class="form-check form-check-inline disabled">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="delete" id="eliminar" value="eliminar" v-model="checkedNames" v-bind:checkedNames="checkedNames"> Eliminar
                  </label>
                </div>
            </div>
          </div>
            <div class="modal-footer">
              <slot name="footer">
                <button type="button" class="btn btn-secondary" @click="$emit('close')">Cerrar</button>
                <button type="submit" class="btn btn-primary" @click="$savePermission()">Guardar</button>
              </slot>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </script>