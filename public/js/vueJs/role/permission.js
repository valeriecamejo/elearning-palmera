
Role = new Vue({
  el: '#role',
  data: {
    selected:           '',
    modules:            [],
    role_permissions:   [],
    checkedNames:       [],
    active_modules:     [],
    countPermissions:   '',
    module_permissions: {
      is_active: 0,
      module_id: '',
      permissions: {
          crear: 0,
          editar: 0,
          ver: 0,
          eliminar: 0}
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
          if(role_id !== 1) {
            Role.role_permissions = eval(response.data);
            Role.activeModules();
          } else {
            Role.active_modules   = Role.modules;
            Role.role_permissions = [];
          }
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
      Role.active_modules = [];
      $.each(Role.role_permissions, function( index, permission ) {
        if (permission.is_active == false) {
          $.each(Role.modules, function( index, module ) {
            if (permission.module_id == module.id) {
              Role.active_modules.push(module);
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
    savePermission: function(role_id)  {
    //Guardar permisos para un rol
      axios.post('/roles/permission/store/' + role_id , {
        permissions: Role.role_permissions,
      }).then(function(response){
        console.log(response.data);
        Role.permission(role_id);
      }).catch(function(data){
        this.errors   = data.responseJSON
      });
    }
  }
})

