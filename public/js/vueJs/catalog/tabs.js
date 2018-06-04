
Vue.component('purchase-preview', {
  props: ['product'],
}),

Tabs = new Vue({
  el: '#tabs',
  data: {
    contents: '',
    downloads: '',
    evaluations: '',
    foros: '',
    tabContent: false,
    tabDownload: false,
    tabEvaluation: false,
    tabForos: false,
    product_id: '',
  },
  methods: {
    //Consulta de todo el contenido de un producto
    content: function (id) {
      HTTP.get('/contents/product/' + id , {
      }).then((response) => {
        Tabs.contents      = response.data.data
        Tabs.tabContent    = true
        Tabs.tabDownload   = false
        Tabs.tabEvaluation = false
        Tabs.tabForos      = false
        Tabs.product_id    = id
      }).catch(function (data) {
        this.errors = data.responseJSON
      });
    },
    //Consulta de los archivos descargables de un producto
    download: function (id) {
      HTTP.get('/downloads/product/' + id, {
      }).then((response) => {
        Tabs.downloads     = response.data.data
        Tabs.tabContent    = false
        Tabs.tabDownload   = true
        Tabs.tabEvaluation = false
        Tabs.tabForos      = false
      }).catch(function (data) {
        this.errors = data.responseJSON
      });
    },
    //Consulta de Evaluaciones para un producto
    evaluation: function (id) {
      HTTP.get('/evaluations/product/' + id, {
      }).then((response) => {
        Tabs.evaluations   = response.data.data
        Tabs.tabContent    = false
        Tabs.tabDownload   = false
        Tabs.tabEvaluation = true
        Tabs.tabForos      = false
      }).catch(function (data) {
        this.errors = data.responseJSON
      });
    }
  }
})