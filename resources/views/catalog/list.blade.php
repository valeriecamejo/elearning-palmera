@extends('layouts.app')

@section('content')
<div id="search">
  <div class="row justify-content-center card-columns">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
            <h5 class="card-title">Catálogo</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <div class="card">
                <template v-for="product in products.data">
                  <template v-if="product.photo">
                      <a :href="'/products/show/' + product.id">
                        <img :src="'/storage/' + product.photo">
                      </a>
                  </template>
                  <template v-else>
                      <a :href="'/products/show/' + product.id">
                        <img class="card-img-top" :src="'img/sinfoto.png'" alt="product.name">
                      </a>
                  </template>
                  <div class="card-body">
                    <h5 class="card-title">@{{ product.name }}</h5>
                  </div>
                  </template>
                </template>
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
