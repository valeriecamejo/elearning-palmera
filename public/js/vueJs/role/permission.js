// Vue.component('modal', {
//   template: '#role-modal',
//   data() {
//     return {
//       checkedNames: [],
//     };
// },
// });

role = new Vue({
  el: '#role',
  data: {
    modules:          {},
    role_permissions: {},
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
    permission: function (role_id) {
      axios.get('/roles/permission/create/' + role_id , {
      }).then(function(response){
        role.role_permissions = JSON.parse(response.data);
        // b = JSON.stringify(response.data);
        //   var role_permissions = JSON.parse(b);
        console.log(role.role_permissions);
      }).catch(function(data){
        this.errors = data.responseJSON
      });

    }
  }
})