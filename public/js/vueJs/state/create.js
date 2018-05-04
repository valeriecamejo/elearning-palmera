
State = new Vue({
  el: '#state',
  data: {
    countries:      '',
    data_ready:     false,
    country_id:     '',
},
  mounted() {
    axios.get('/countries/all' , {
    }).then((response) => {
        State.countries = response.data;
        State.data_ready = true;
      });
  }
})

