@extends('layouts.app')

@section('content')
<div id="search">
  <div class="row justify-content-center card-columns">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categoría
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something</a>
                  </div>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input v-model="search" class="form-control mr-sm-2" type="search" aria-label="Search">
                  <button @click="getUsers" class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
              </form>
            </div>
          </nav>
        </div>
        <div class="card-body">
          <div class="row">
            <div v-for="product in filteredList" class="col-sm-12 col-md-4">
              <div class="card">
                <a v-if="product.photo" :href="'/products/show/' + product.id">
                  <img class="card-img-top" :src="'/storage/' + product.photo">
                </a>
                <a v-else :href="'/products/show/' + product.id">
                  <img class="card-img-top" :src="'img/sinfoto.png'" alt="product.name">
                </a>
                <div class="card-body">
                  <h5 class="card-title">@{{ product.name }}</h5>
                  <h5 class="card-title">@{{ product.price }}$</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{!! Html::script('/js/vueJs/catalog/filter.js') !!}
@endsection
