@extends('layouts.app')

@section('content')
<div id="validate">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/incentive-plans') }}">Plan de Incentivos</a>
            </li>
          </ul>
        </div>
          <div class="card-body">
            <h5 class="card-title">Crear un Plan de Incentivo</h5>
            <form method="POST" action="{{ url('incentive-plans/edit/' . $incentive_plan->id) }}">
              @csrf
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>
                <div class="col-md-4">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $incentive_plan->name }}" required autofocus>
                @if ($errors->has('name'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Plan de Incentivo por:') }}</label>
                  <div class="col-md-8">
                    <div class="form-check-inline">
                    <input type="radio" id="sales" name="incentive" value="sales" v-model="incentive" >
                    <label for="sales"> Ventas</label>
                    </div>
                    <div class="form-check-inline">
                      <input type="radio" id="elearning" name="incentive" value="elearning" v-model="incentive">
                      <label for="elearning"> Entrenamiento</label>
                    </div>
                  </div>
              </div>
              <template v-if="incentive=='sales'">
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Roles:') }}</label>
                  <div class="col-md-4">
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" id="supervisor" value="supervisor" name="supervisor" v-model="roleSelected.supervisor" checked> Supervisor
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" id="seller" value="vendedor" name="seller" v-model="roleSelected.vendedor"> Vendedor
                      </label>
                    </div>
                    <div class="form-check form-check-inline disabled">
                      <label class="form-check-label">
                        <input type="checkbox" id="promoter" value="promotor" name="promoter" v-model="roleSelected.promotor"> Promotor
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Producto(s):') }}</label>
                  <div class="col-md-4">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="all_products" value="all_products" v-model="all_products" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Todos los Productos</label>
                    </div>
                    @if ($errors->has('name'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <template v-if="all_products!=true">
                  <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>
                    <div class="col-md-4">
                      <select multiple  v-model="product" name="product[]" class="form-control" required>
                        <option v-for="(allProduct in allProducts" :value="allProduct.id">
                            @{{ allProduct.name }}
                        </option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <div class="alert alert-info" role="alert">
                        <h6>Seleccionar varios items pulsando la tecla <b>ctrl</b> y <b>clic</b> sobre el valor deseado</h6>
                      </div>
                    </div>
                  </div>
                </template>
              </template>
              <template v-if="incentive=='elearning'">
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Roles:') }}</label>
                  <div class="col-md-4">
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" id="supervisor" value="supervisor" v-model="roleSelected.supervisor" checked> Supervisor
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" id="vendedor" value="vendedor" v-model="roleSelected.vendedor"> Vendedor
                      </label>
                    </div>
                    <div class="form-check form-check-inline disabled">
                      <label class="form-check-label">
                        <input type="checkbox" id="promotor" value="promotor" v-model="roleSelected.promotor"> Promotor
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Evaluacion(es):') }}</label>
                  <div class="col-md-4">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="all_evaluations" value="all_evaluations" v-model="all_evaluations" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Todas las Evaluaciones</label>
                    </div>
                    @if ($errors->has('name'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <template v-if="all_evaluations!=true">
                  <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>
                    <div class="col-md-4">
                      <select multiple v-model="evaluation" name="evaluation[]" class="form-control" required>
                        <option v-for="allEvaluation in allEvaluations" :value="allEvaluation.id">
                            @{{ allEvaluation.name }}
                        </option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <div class="alert alert-info" role="alert">
                        <h6>Seleccionar varios items pulsando la tecla <b>ctrl</b> y <b>clic</b> sobre el valor deseado</h6>
                      </div>
                    </div>
                  </div>
                </template>
              </template>
              <hr>
              <div class="form-group row">
                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Inicio actual') }}</label>
                <div class="col-md-4">
                  <?php
                  $fecha = $incentive_plan->start_date;
                  $fechaBD = date("d-m-Y", strtotime($fecha));
                  ?>
                  <input type="text" class="form-control" value="{{ $fechaBD }}" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Actualizar Fecha a:') }}</label>
                <div class="col-md-4">
                  <?php
                  $fecha = $incentive_plan->start_date;
                  $fechaBD = date("d-m-Y", strtotime($fecha));
                  ?>
                  <input type="date" class="form-control" name="start_date">
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('¿Posee fecha Final?') }}</label>
                  <div class="col-md-4">
                    <div class="form-check-inline">
                    <input type="radio" id="one" name="is_end_date" value="yes" v-model="end_date">
                    <label for="one">Si</label>
                    </div>
                    <div class="form-check-inline">
                      <input type="radio" id="two" name="is_end_date" value="no" v-model="end_date">
                      <label for="two">No</label>
                    </div>
                  </div>
              </div>
              <template v-if="end_date=='yes'">
                <div class="form-group row">
                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha final actual') }}</label>
                <div class="col-md-4">
                  <?php
                  if($incentive_plan->end_date != null) {
                    $fecha = $incentive_plan->end_date;
                    $fecha_end = date("d-m-Y", strtotime($fecha));
                  } else {
                    $fecha_end = "0000-00-00";
                  }
                  ?>
                  <input type="text" class="form-control" value="{{ $fecha_end }}" disabled>
                </div>
              </div>
                <div class="form-group row">
                  <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Actualizar Fecha a:') }}</label>
                  <div class="col-md-4">
                    <input type="date" class="form-control" name="end_date"/>
                  </div>
                </div>
              </template>
              <hr>
              <div class="form-group row">
                <label for="score" class="col-md-4 col-form-label text-md-right">{{ __('Puntaje') }}</label>
                <div class="col-md-4">
                  <input id="score" type="number" class="form-control{{ $errors->has('score') ? ' is-invalid' : '' }}"
                  name="score" value="{{ $incentive_plan->score }}" min="0" required>
                  @if ($errors->has('score'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('score') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-md-6 col-form-label"><h4>{{ __('Contenido') }}</h4></label>
                <a class="col-md-5 text-md-right" href="{{ url('/contents/images/' . Auth::user()->brand_id) }}" target="_blank">
                  <i class="far fa-image">Mostrar Imagenes</i>
                </a><br>
                <div class="col-md-12">
                <textarea class="ckeditor" name="editor1" value="{{ old('editor1') }}" id="editor1" rows="10" cols="80" required>
                  {!! $incentive_plan->data !!}
                </textarea>
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Guardar') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
{!! Html::script('/js/vueJs/incentive_plan/validation_edit.js') !!}
<script> Validate.typeIncenvite( {{ $incentive_plan_id }} )</script>
@endsection
