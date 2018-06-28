Filter = new Vue({
  el: '#filter',
  data: {
    state_permissions: [],
    permissions:       [],
    countries:         [],
    allStates:         [],
    all_data:          [],
    modules:           [],
    states:            [],
    country:           'all',
    country_id:        '',
  },
  mounted() {
    //Consulta de todos los paises
    HTTP.get('/countries/all', {}).then((response) => {
      Filter.countries = response.data;
    });
    HTTP.get('/states/all', {}).then((response) => {
      Filter.allStates = response.data;
      Filter.states    = Filter.allStates;
    });
    //Consulta los permisos del rol actual
    HTTP.get('/roles/users/permission', {}).then((response) => {
      Filter.all_data          = response.data
      Filter.permissions       = Filter.all_data[0]
      Filter.modules           = Filter.all_data[1]
      Filter.permissions       = eval(Filter.permissions[0].permission);
      Filter.state_permissions = Filter.permissions[13].permissions;
      Filter.permission()
    }).catch(function (data) {
      this.errors = data.responseJSON
    });
  },
  methods: {
    //Filtra por pais
    filterCountry: function () {
      Filter.states = Filter.allStates.filter(function (state) {
        return state.country_id == Filter.country_id;
      });
    }
  },
})