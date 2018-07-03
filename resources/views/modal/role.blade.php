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
              </slot>
            </div>
            <div class="form-group row">
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