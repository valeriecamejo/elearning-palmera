
Search = new Vue({
  el: '#search',
  data: {
    allProducts: [],
    categories:  [],
    products:    [],
    category_id: '',
    filter:      '',
    search:      '',
    category:    'all',
    ready:       false,
  },
  mounted() {
    //Consulta de todos los productos
    axios.get('/catalogs/products' , {
    }).then((response) => {
      Search.allProducts = response.data.data
      Search.products = Search.allProducts
      }).catch(function(data){
        this.errors   = data.responseJSON
      });
      //Consulta de todos los productos
    axios.get('/categories/all' , {
      }).then((response) => {
        Search.categories = response.data
        Search.ready = true;
      }).catch(function(data){
          this.errors   = data.responseJSON
        });
  },
  methods: {
    //Filtra por categoria
    filterCategory: function () {
      Search.search = '';
      if (Search.category_id == '') return Search.products = Search.allProducts;
      Search.products = Search.allProducts.filter(function(product) {
          return product.category_id == Search.category_id;
        });
    }
  },
  computed: {
    //Filtra por buscador
    filterProduct() {
      return this.products.filter((product) => product.name.toLowerCase().includes(this.search.toLowerCase()));
    }
  }
})