Filter = new Vue({
  el: '#filter',
  data: {
    state_permissions: [],
    allCountries:      [],
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
      Filter.allCountries = response.data;
      Filter.countries    = Filter.allCountries;
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
      if (Filter.country_id == '') {
        Filter.states       = Filter.allStates
        Filter.countries    = Filter.allCountries
        country             = 'all'
      } else {
        Filter.states = Filter.allStates.filter(function (state) {
          return state.country_id == Filter.country_id;
        });
      }
    }
  },
})