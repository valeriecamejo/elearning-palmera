Menu = new Vue({
  el: '#menu',
  data: {
    permissions:        [],
    modules:            [],
    user_permissions:   [],
  },
   mounted() {
     //Consulta los permisos del usuario actual
     HTTP.get('/roles/users/permission', {}).then((response) => {
       Menu.all_data    = response.data
       Menu.permissions = Menu.all_data[0]
       Menu.modules     = Menu.all_data[1]
       Menu.permissions = eval(Menu.permissions[0].permission);
       Menu.permission()
     }).catch(function (data) {
       this.errors = data.responseJSON
     });
   },
   methods: {
     permission: function () {

      $.each(Menu.permissions, function (index, permission) {
        if (permission.is_active == true) {
          $.each(Menu.modules, function (index, module) {
            if ((module.active == true) && (permission.module_id == module.id)) {
              Menu.user_permissions.push(module);
            }
          });
        }
      });
     },
   }
})
