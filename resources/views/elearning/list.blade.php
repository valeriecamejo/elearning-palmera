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
                    <div class="col-md-3 ">
                      <h3><strong>Evaluaciones</strong></h3><br>
                      </div>
                        <div class="col-md-6 offset-md-3">
                          <input v-model="search" class="form-control mr-sm-4" placeholder="Buscar" type="search" aria-label="Search">
                      </div>
                <form class="form-inline my-2 my-lg-0">
                </form>
              </div>
            </nav>
          </div>
          <div class="card-body">
            <div class="row">
              <div v-for="evaluation in filterEvaluation" class="col-sm-12 col-md-4">
                <div  class="card">
                  <a v-if="evaluation.photo" :href="'./evaluations/' + evaluation.id + '/' + evaluation.product_id">
                    <img class="card-img-top" :src="'/storage/evaluation_' + {{Auth::user()->brand_id}} + '/' + evaluation.photo">
                    <h5 class="card-title">@{{ evaluation.name }}</h5>
                  </a>
                  <a v-else :href="'./evaluations/' + evaluation.id + '/' + evaluation.product_id">
                    <img class="card-img-top" :src="'img/sinfoto.png'" alt="evaluation.name">
                    <h5 class="card-title">@{{ evaluation.name }}</h5>
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
{!! Html::script('./js/vueJs/elearning/filter.js') !!}
@endsection
