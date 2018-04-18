Vue.component('modal', {
  template: '#role-modal'
})

new Vue({
  el: '#role',
  data: {
    showModal: false,
    modules: [],
  },
  methods: {
    permission: function (role_id, user_modules, act_modal) {
      axios.get('/roles/permission/' + role_id , {
      }).then(function(response){
        this.role = response.data;
        this.modules = user_modules;
        console.log(modules);
      }).catch(function(data){
        this.errors = data.responseJSON
    })
    }
  }
})