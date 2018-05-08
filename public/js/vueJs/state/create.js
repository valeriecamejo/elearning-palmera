
State = new Vue({
  el: '#state',
  data: {
    countries:        '',
    data_ready:       false,
    country_id:       '',
    previous_country: '',
},
  mounted() {
    axios.get('/countries/all' , {
    }).then((response) => {
        State.countries = response.data;
        State.data_ready = true;
      });
  },
  methods: {
    country_data: function (country) {
      State.previous_country = country;
    },
  }
})

