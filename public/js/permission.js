Vue.component('modal', {
  template: '#modal-template'
})

vm = new Vue({
  el: "#role",
  data: {
    showModal: false
  },
  methods: {
    permission: function (role_id) {
      axios.get('/roles/permission/' + role_id , {
      }).then(function(response){
        this.role = response.data;
        console.log('entro');
      }).catch(function(data){
        this.errors = data.responseJSON
    })
    }
  }
})