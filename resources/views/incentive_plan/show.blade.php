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
                  <div class="col-md-6">
                    <p class="col-form-label">{{ $incentive_plan->name }}</p>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Plan de Incentivo por:') }}</label>
                  <div class="col-md-8">
                    <div class="form-check-inline">
                    <input type="radio" id="sales" name="incentive" value="sales" v-model="incentive" disabled>
                    <label for="sales"> Ventas</label>
                    </div>
                    <div class="form-check-inline">
                      <input type="radio" id="elearning" name="incentive" value="elearning" v-model="incentive" disabled>
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
                        <input type="checkbox" id="supervisor" value="supervisor" name="supervisor" v-model="roleSelected.supervisor" disabled> Supervisor
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" id="seller" value="vendedor" name="seller" v-model="roleSelected.vendedor" disabled> Vendedor
                      </label>
                    </div>
                    <div class="form-check form-check-inline disabled">
                      <label class="form-check-label">
                        <input type="checkbox" id="promoter" value="promotor" name="promoter" v-model="roleSelected.promotor" disabled> Promotor
                      </label>
                    </div>
                  </div>
                </div>
                <template v-if="all_products==true">
                  <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Producto(s):') }}</label>
                      <div class="col-md-4">
                        "Todos los productos"
                      </div>
                  </div>
                </template>
                <template v-if="all_products!=true">
                  <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Producto(s)') }}</label>
                    <div class="col-md-4">
                      @foreach ($product_names as $product_name)
                        <ul>
                          <li>
                            {{ $product_name }}<br>
                          </li>
                       </ul>
                      @endforeach
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
                        <input type="checkbox" id="supervisor" value="supervisor" v-model="roleSelected.supervisor" disabled> Supervisor
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" id="vendedor" value="vendedor" v-model="roleSelected.vendedor" disabled> Vendedor
                      </label>
                    </div>
                    <div class="form-check form-check-inline disabled">
                      <label class="form-check-label">
                        <input type="checkbox" id="promotor" value="promotor" v-model="roleSelected.promotor" disabled> Promotor
                      </label>
                    </div>
                  </div>
                </div>

                <template v-if="all_evaluations==true">
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Evaluacion(es):') }}</label>
                  <div class="col-md-4">
                        "Todas las Evaluaciones"
                      </div>
                  </div>
                </template>
                <template v-if="all_evaluations!=true">
                  <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Evaluacion(es)') }}</label>
                    <div class="col-md-4">
                      @foreach ($evaluation_names as $evaluation_name)
                        <ul>
                          <li>
                            {{ $evaluation_name }}<br>
                          </li>
                       </ul>
                      @endforeach
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
                  <div class="col-md-6">
                    <p class="col-form-label">{{ $fechaBD }}</p>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('¿Posee fecha Final?') }}</label>
                  <div class="col-md-4">
                    <div class="form-check-inline">
                    <input type="radio" id="one" name="is_end_date" value="yes" v-model="end_date" disabled>
                    <label for="one">Si</label>
                    </div>
                    <div class="form-check-inline">
                      <input type="radio" id="two" name="is_end_date" value="no" v-model="end_date" disabled>
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
                  <div class="col-md-6">
                    <p class="col-form-label">{{ $fecha_end }}</p>
                  </div>
                </div>
              </div>
              </template>
              <div class="form-group row">
                <label for="score" class="col-md-4 col-form-label text-md-right">{{ __('Puntaje:') }}</label>
                <div class="col-md-4">
                  <div class="col-md-6">
                    <p class="col-form-label">{{ $incentive_plan->score }}</p>
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <label for="name" class="col-md-6 col-form-label"><h4>{{ __('Contenido') }}</h4></label>
                <div class="col-md-12">
                  {!! $incentive_plan->data !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-md-6 col-form-label"><h4>{{ __('Terminos y Condiciones') }}</h4></label>
                <div class="col-md-12">
                  {!! $incentive_plan->terms_conditions !!}
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
