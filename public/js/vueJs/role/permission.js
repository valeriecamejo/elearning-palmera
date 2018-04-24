Vue.component('permission', {
  template: '#permission',
  props: []
//   data() {
//     return {
//       checkedNames: [],
//     };
// },
});

role = new Vue({
  el: '#role',
  data: {
    modules:          [],
    role_permissions: [],
  },
  mounted() {
    axios.get('/modules/list' , {
      }).then(function(response){
        role.modules = response.data;
      }).catch(function(data){
        this.errors = data.responseJSON
      });
  },
  methods: {
    permissionRoles: function (role_id) {
      axios.get('/roles/permission/create/' + role_id , {
      }).then(function(response){
        role.role_permissions = eval(response.data);
      }).catch(function(data){
        this.errors = data.responseJSON
      });

    }
  }
})