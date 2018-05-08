
City = new Vue({
  el: '#city',
  data: {
    states:         '',
    countries:      '',
    data_ready:     false,
    state_id:       '',
    country_id:       '',
    previous_country: '',
    previous_state: '',
    changedValue:   '',
},
  mounted() {
    axios.get('/countries/all' , {
    }).then((response) => {
        City.countries = response.data;
        City.data_ready = true;
      });
  },
  methods: {
    statesOfCountry: function (country_id) {
      axios.get('/states/all/' + country_id , {
      }).then((response) => {
        City.states = response.data;
        }).catch(function(data){
          this.errors   = data.responseJSON;
      });
    },
    country_data: function (country, state) {
      City.previous_country = country;
      City.previous_state   = state;
      City.statesOfCountry(country);
    },
  }
})

