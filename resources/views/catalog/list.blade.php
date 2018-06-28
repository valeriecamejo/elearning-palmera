@extends('layouts.app')

@section('content')
<div id="search">
    <div class="row justify-content-center card-columns">
      <div class="col-md-10">
        <template v-if="ready==true">
        <div class="card">
          <div class="card-header">
            <nav class="navbar navbar-expand-lg navbar-expand-md navbar-light bg-light">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="col-md-2">
                      <select v-model="category_id" @change="filterCategory(category.id)" class="form-control" required>
                        <option desabled value=''>Todas</option>
                        <option v-for="category in categories" :value="category.id"  >
                           @{{ category.name }}
                        </option>
                      </select>
                    </div>
                  <div class="col-md-4 offset-md-6">
                    <input v-model="search" class="form-control mr-sm-2" placeholder="Buscar" type="search" aria-label="Search">
                  </div>
              </div>
            </nav>
          </div>
          <div class="card-body">
            <div class="row">
              <div v-for="product in filterProduct" class="col-sm-12 col-md-4">
                <div  class="card">
                  <a v-if="product.photo" :href="'./product/' + product.id">
                    <img class="card-img-top" :src="'/storage/products/' + product.photo">
                    <h5 class="card-title">@{{ product.name }}</h5>
                    <h5 class="card-title">@{{ product.price }}$</h5>
                  </a>
                  <a v-else :href="'./product/' + product.id">
                    <img class="card-img-top" :src="'img/sinfoto.png'" alt="product.name">
                    <h5 class="card-title">@{{ product.name }}</h5>
                    <h5 class="card-title">@{{ product.price }}$</h5>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        </template>
      </div>
    </div>

</div>

{!! Html::script('./js/vueJs/catalog/filter.js') !!}
@endsection
