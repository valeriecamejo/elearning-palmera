
Role = new Vue({
  el: '#role',
  data: {
    selected:         '',
    modules:          [],
    role_permissions: [],
    checkedNames:     [],
    active_modules:   [],
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
          Role.selected = Role.active_modules[0].name;
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
    }
  }
})
