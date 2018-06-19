
Validate = new Vue({
  el: '#validate',
  data: {
    roles:           {},
    product_data:    {},
    role_id:         '',
    product:         [],
    end_date:        '',
    incentive:       '',
    evaluation:      [],
    allProducts:     [],
    all_products:    '',
    allEvaluations:  [],
    all_evaluations: '',
    incentive_plan:  '',
    roleSelected:    {
                      supervisor: 0,
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
  methods: {
    //Metodo para obtener los valores del plan de incentivo a editar
    typeIncenvite: function (incentive_plan_id) {
      HTTP.get('/incentive-plans/dataEdit/' + incentive_plan_id, {}).then(function (response) {
        Validate.incentive_plan = response.data
        //Tipo de plan de incentivo
        if (Validate.incentive_plan['type'] == "Ventas") {
          Validate.incentive = "sales"
        } else if (Validate.incentive_plan['type'] == "E-learning") {
          Validate.incentive = "elearning"
        }
        //Asignacion de fecha final (si existe)
        if (Validate.incentive_plan['end_date'] == null) {
          Validate.end_date = "no"
        } else {
          Validate.end_date = "yes"
        }
        //Roles de los participantes
        Validate.roles = eval(Validate.incentive_plan['roles'])
        Validate.roleSelected['supervisor'] = Validate.roles[0]['status']
        Validate.roleSelected['vendedor']   = Validate.roles[1]['status']
        Validate.roleSelected['promotor']   = Validate.roles[2]['status']
        //Todos los productos
        if (Validate.incentive_plan['products'] == "all") {
          Validate.all_products = true
        }
        //Todas las evaluaciones
        if (Validate.incentive_plan['evaluations'] == "all") {
          Validate.all_evaluations = true
        }
        //Productos que aplican al plan de incentivo
        if (Validate.incentive_plan['products'] != "")  {
          Validate.product_data = eval(Validate.incentive_plan['products'])
          $.each(Validate.product_data, function (index, content_product) {
              Validate.product.push(content_product.id)
          });
        }
        //Evaluaciones que aplican al plan de incentivo
        if (Validate.incentive_plan['evaluations'] != "")  {
          Validate.evaluation_data = eval(Validate.incentive_plan['evaluations'])
          $.each(Validate.evaluation_data, function (index, content_evaluation) {
              Validate.evaluation.push(content_evaluation.id)
          });
        }

      }).catch(function (data) {
        this.errors = data.responseJSON
      });
    },
  }
})