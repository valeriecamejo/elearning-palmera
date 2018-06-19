Validate = new Vue({
  el: '#validate',
  data: {
    role_id:         '',
    roles:           [],
    product:         '',
    end_date:        'no',
    incentive:       'sales',
    evaluation:      '',
    allProducts:     [],
    all_products:    true,
    allEvaluations:  [],
    all_evaluations: '',
    roleSelected:    {
                        supervisor: 1,
                        vendedor: 0,
                        promotor: 0,
                      },
  },
  mounted() {
    //Consulta de todos los productos
    HTTP.get('/catalogs/products', {}).then((response) => {
      Validate.allProducts = response.data.data
    }).catch(function (data) {
      this.errors = data.responseJSON
    });
    //Consulta de todas las evaluaciones
    HTTP.get('/evaluations/all', {}).then((response) => {
      Validate.allEvaluations = response.data.data
    }).catch(function (data) {
      this.errors = data.responseJSON
    });
  },
})