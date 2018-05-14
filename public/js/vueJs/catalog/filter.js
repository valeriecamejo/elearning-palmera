
Search = new Vue({
  el: '#search',
  data: {
    products: [],
    name: '',
  },
  mounted() {
    axios.get('/catalogs/products' , {
    }).then((response) => {
      Search.products = response.data;
      console.log(Search.products);
      });
  },
  methods: {
  },
  computed: {
  }
})

