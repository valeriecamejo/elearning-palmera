
Search = new Vue({
  el: '#search',
  data: {
    products: [],
    search:     '',
    lists:     [],
  },
  mounted() {
    axios.get('/catalogs/products' , {
    }).then((response) => {
      Search.products = response.data.data;
      });
  },
  methods: {
    getUsers: function () {
      var urlUsers = 'https://jsonplaceholder.typicode.com/users';
      axios.get(urlUsers).then(response => {
        Search.lists = response.data
      });
    }
  },
  computed: {
    filteredList() {
      return this.products.filter((product) => product.name.toLowerCase().includes(this.search.toLowerCase()));
    }
  }
})