Filter = new Vue({
  el: '#filter',
  data: {
    state_by_countries: [],
    city_permissions:   [],
    city_by_states:     [],
    allCountries:       [],
    permissions:        [],
    countries:          [],
    allStates:          [],
    allCities:          [],
    all_data:           [],
    modules:            [],
    states:             [],
    cities:             [],
    state:             'all',
    city:              'all',
    country:           'all',
    city_id:           '',
    country_id:        '',
    state_id:          '',
    state_id:          '',
  },
  mounted() {
    //Consulta de todos los paises
    HTTP.get('/countries/all', {}).then((response) => {
      Filter.allCountries = response.data;
      Filter.countries = Filter.allCountries;
    });
    HTTP.get('/states/all', {}).then((response) => {
      Filter.allStates = response.data;
      Filter.states = Filter.allStates;
    });
    HTTP.get('/cities/all', {}).then((response) => {
      Filter.allCities = response.data;
      Filter.cities    = Filter.allCities;
    });
    //Consulta los permisos del rol actual
    HTTP.get('/roles/users/permission', {}).then((response) => {
      Filter.all_data = response.data
      Filter.permissions = Filter.all_data[0]
      Filter.modules = Filter.all_data[1]
      Filter.permissions = eval(Filter.permissions[0].permission);
      Filter.city_permissions = Filter.permissions[14].permissions;
      Filter.permission()
    }).catch(function (data) {
      this.errors = data.responseJSON
    });
  },
  methods: {
    //Filtra por pais
    filterCountry: function () {
      if (Filter.country_id == '' ) {
        Filter.countries  =  Filter.allCountries
        Filter.states     =  Filter.allStates
        Filter.cities     =  Filter.allCities
        Filter.state_id   =  ''
        Filter.country_id =  ''
        state             =  'all'
        city              =  'all'
        country           =  'all'
      } else {
      Filter.countries = Filter.allCountries
      Filter.states    = Filter.allStates
      Filter.cities    = Filter.allCities
      Filter.state_id  = ''
      Filter.allCitiesByCountry()
      Filter.states = Filter.allStates.filter(function (state) {
        return state.country_id == Filter.country_id;
      });
      }
    },
    //Filtra por estado/provincia
    filterState: function () {
      Filter.cities = Filter.allCities.filter(function (city) {
        return city.state_id == Filter.state_id;
      });
    },
    allCitiesByCountry () {
      Filter.state_by_countries = []
      Filter.states = Filter.allStates
      Filter.city_by_states = []
      Filter.cities = Filter.allCities
      $.each(Filter.states, function (index, state) {
        if (state.country_id == Filter.country_id) {
          Filter.state_by_countries.push(state);
        }
      });
      $.each(Filter.state_by_countries, function (index, state) {
        $.each(Filter.cities, function (index, city) {
          if (city.state_id == state.id) {
            Filter.city_by_states.push(city);
          }
        });
      });
      Filter.cities = Filter.city_by_states;
    }
  },
})