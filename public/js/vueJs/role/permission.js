
Role = new Vue({
  el: '#role',
  data: {
    show_modules_deactive: '',
    edited_permissions:    [],
    selected:              '',
    modules:               [],
    role_permissions:      [],
    active_modules:        [],
    deactive_modules:      [],
    show_modules:          '',
    countPermissions:      '',
    name:                  [],
    message:               false,
    showModal:             false,
    module_permissions:    {
                            is_active: 0,
                            module_id: '',
                            permissions: {
                                          crear: 0,
                                          editar: 0,
                                          ver: 0,
                                          eliminar: 0
                                         }
                           },
  },
  methods: {
    permission: function (role_id) {

    //Consulta de todos los modulos
      axios.get('/modules/list' , {
      }).then(function(response){
        Role.modules = response.data;
      //Consulta de los permisos de un rol
        axios.get('/roles/permission/create/' + role_id , {
        }).then(function(response){
            Role.role_permissions = eval(response.data);
            Role.activeModules();
          Role.selected           = Role.active_modules[0].id;
        }).catch(function(data){
          this.errors   = data.responseJSON
        });
        //Fin consulta de los permisos de un rol
      }).catch(function(data){
        this.errors = data.responseJSON
      });
      //Fin consulta de todos los modulos
    },
    //Crea el array de los modulos que no poseen permisos segun el rol seleccionado
    activeModules: function() {
      Role.active_modules   = [];
      Role.deactive_modules = [];
      Role.show_modules     = false;
      Role.show_modules_deactive = false;
      $.each(Role.role_permissions, function( index, permission ) {
        if (permission.is_active == false) {
          Role.show_modules = true;
          $.each(Role.modules, function( index, module ) {
            if (permission.module_id == module.id) {
              Role.active_modules.push(module);
            }
          });
        } else {
          Role.show_modules_deactive = true;
          $.each(Role.modules, function( index, module ) {
            if (permission.module_id == module.id) {
              Role.name = { is_active: permission.is_active, module_id: module.id, name: module.name, permissions: permission.permissions };
              Role.deactive_modules.push(Role.name);
            }
          });
        }
      });
    },
    addPermission: function(role_id) {
      $.each(Role.module_permissions.permissions, function( index, module_permission ) {
        if (module_permission == true) {
          Role.module_permissions.is_active = true;
        }
      });
      $.each(Role.role_permissions, function( index, permission ) {
        if (permission.module_id == Role.module_permissions.module_id) {
            Role.role_permissions[index] = Role.module_permissions;
        }
      });
      Role.savePermission(role_id);
    },
    //Guardar permisos para un rol
    savePermission: function(role_id)  {
      axios.post('/roles/permission/store/' + role_id , {
        permissions: Role.role_permissions,
      }).then(function(response){
        Role.showModal = true;
        Role.permission(role_id);
        Role.module_permissions = { is_active: 0, module_id: '', permissions: { crear: 0, editar: 0, ver: 0,eliminar: 0}};
      }).catch(function(data){
        this.errors   = data.responseJSON
      });
    },
    //Editar permisos para
    editPermission: function(role_id) {
      $.each(Role.role_permissions, function( index, permissions) {
        if ( (permissions.permissions.ver == true) || (permissions.permissions.crear == true) || (permissions.permissions.editar == true) || (permissions.permissions.eliminar == true)) {
              permissions.is_active = true;
        } else {
          permissions.is_active = false;
        }
      });
      axios.post('/roles/permission/edit/' + role_id , {
        permissions: Role.role_permissions,
      }).then(function(response){
        Role.showModal = true;
      }).catch(function(data){
        this.errors   = data.responseJSON
      });
    }
  }
})

