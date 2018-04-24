// Vue.component('permission', {
//   template: '#permission',
//   props: ['modules'],
// //   data() {
// //     return {
// //       checkedNames: [],
// //     };
// // },
// });

role = new Vue({
  el: '#role',
  data: {
    selected: 'A',
    options: [
      { text: 'One', value: 'A' },
      { text: 'Two', value: 'B' },
      { text: 'Three', value: 'C' }
    ],
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
    permission: function (role_id) {
      axios.get('/roles/permission/create/' + role_id , {
      }).then(function(response){
        role.role_permissions = eval(response.data);
        console.log(role.modules[0].name);
      }).catch(function(data){
        this.errors = data.responseJSON
      });

    }
  }
})