Delete = new Vue({
  el: '#delete',
  data: {
    active:      false,
    response:    '',
    download_id: '',
    delete_url:  '',
  },
  methods: {
    deleteRegister: function () {
      Delete.active = false;
      axios.get(Delete.delete_url, {}).then((response) => {
        Delete.response = response.data
        Delete.delete_url = ''
      }).catch(function (data) {
        this.errors = data.responseJSON;
      });
    },
    activeAlert: function (url, id) {
      Delete.download_id = id
      Delete.active      = true
      Delete.delete_url  = url
    }
  }
})
