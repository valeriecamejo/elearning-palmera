
vm = new Vue ({
    el: "#permission",
    data: {
      modules: '',
    },
    methods: {
      permission: function () {
              console.log('llego por console');
              return 'llego';
          }
    }
});