Validate = new Vue({
  el: '#validate',
  data: {
    is_end_date: '',
    states: '',
  },
  methods: {
    statesOfCountry: function (country_id) {
      HTTP.get('/states/all/' + country_id, {}).then((response) => {
        City.states = response.data;
      }).catch(function (data) {
        this.errors = data.responseJSON;
      });
    },
    country_data: function (country, state) {
    },
  }
})