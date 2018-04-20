Vue.component('modal', {
  template: '#role-modal',
  data() {
    return {
      checkedNames: [],
    };
},
});

new Vue({
  el: '#role',
  data: {
    showModal: false,
    modules: [],
    role_id: 0,
  },
  methods: {
    permission: function (role, user_modules, act_modal) {
      axios.get('/roles/permission/' + role , {
      }).then(function(response){
        this.role = response.data;
        this.modules = user_modules;
        this.role_id = role;
      }).catch(function(data){
        this.errors = data.responseJSON
    })
    }
  }
})