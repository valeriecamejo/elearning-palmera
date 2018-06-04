@extends('layouts.app')

@section('content')
<div id="tabs" class="row justify-content-center">
	<div class="col-md-10">
    <div class="card">
      @if ($product->photo)
      <img class="card-img-top" src="{{ asset('storage/products/' .$product->photo) }}" alt="{{ $product->name }}" style="max-heigth: 180px !important">
      @else
      <img class="card-img-top" src="{{ asset('img/sinfoto2.png') }}" alt="{{ $product->name }}" style="max-heigth: 180px !important">
      @endif
			<div class="card-header">
       <h3>{{ $product->name }} </h3>
       <hr>
       <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link" @click="content( {{ $product_id }} )">Contenidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" @click="download( {{ $product_id }} )">Descargables</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" @click="evaluation( {{ $product_id }} )">E-learning</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" >Foro</a>
          </li>
        </ul>
			</div>
			<div class="card-body">
        <template v-if="tabContent==true">
            <div v-for="content in contents">
              <div v-html="content.data">
              </div>
            </div>
        </template>
        <template v-if="tabDownload==true">
          <table class="table table-bordered table-hover">
            <tr>
              <th>Nombre</th>
              <th>Archivo</th>
            </tr>
            <tr v-for="download in downloads">
              <td> @{{ download.name }} </td>
              <td>
                <a :href="'/storage/marca_' + {{ Auth::user()->brand_id }} + '/' + download.file" target="_blank"> @{{ download.file }} </a>
              </td>
            </tr>
          </table>
        </template>
        <template v-if="tabEvaluation==true">
          <div class="card-body">
            <div class="alert alert-info" role="alert">
              <h4 class="alert-heading">Atención  <i class="fa fa-exclamation-circle"></i></h4>
              Solo continue si esta seguro de hacer la evaluacón elegida.
            </div>
            <table class="table table-striped">
              <tr v-for="evaluation in evaluations">
                <td> @{{ evaluation.name }} </td>
                <td>
                  <a class="btn btn-success" :href="'/evaluations/'+ evaluation.id + '/' + {{ $product_id }}">
                    Continuar <i class="fa fa-play-circle"></i>
                  </a>
                </td>
              </tr>
            </table>
          </div>
        </template>
      </div>
	  </div>
	</div>
</div>
{!! Html::script('./js/vueJs/catalog/tabs.js') !!}
<script> Tabs.content( {{ $product_id }} )</script>
@endsection
