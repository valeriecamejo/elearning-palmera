Search = new Vue({
  el: '#search',
  data: {
    ready: false,
    allEvaluations: [],
    avaluations: [],
    filter: '',
    search: '',
  },
  mounted() {
    //Consulta todas las evaluaciones de la marca
    HTTP.get('/evaluations/list', {}).then((response) => {
      Search.allEvaluations = response.data.data
      Search.avaluations = Search.allEvaluations
      Search.ready = true
    }).catch(function (data) {
      this.errors = data.responseJSON
    });
  },
  computed: {
    //Filtra por buscador
    filterEvaluation() {
      return this.avaluations.filter((avaluation) => avaluation.name.toLowerCase().includes(this.search.toLowerCase()));
    }
  }
})