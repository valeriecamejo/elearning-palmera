<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class IncentivePlan extends Model
{
    protected $table = 'incentive_plans';
    protected $fillable = [
                         'name',
                         'data',
                         'type',
                         'score',
                         'start_date',
                         'end_date',
                         'is_active',
                         'who_upload',
                         'who_close',
                         'when_close',
                         'terms_conditions',
                         'roles',
                         'products',
                         'evaluations',
                      ];

		/**
		 * Save a Incentive plan.
		 *
		 * @param  Request  $request
		 * @return incentive_plan
		 */

		public static function insertIncentivePlan($request) {
			$incentive_plan_roles                 = [];
			$incentive_plan_products              = [];
			$incentive_plan_evaluations           = [];
			$incentive_plan                       =  new IncentivePlan;
			$incentive_plan->name                 =  ucwords($request['name']);
			$incentive_plan->data                 =  $request['editor1'];
			$incentive_plan->is_active            =  false;
			$incentive_plan->who_upload           =  Auth::user()->id;
			$incentive_plan->who_close            =  '';
			$incentive_plan->when_close           =  null;
			$incentive_plan->terms_conditions     =  null;
			$incentive_plan->products             =  '';
			$incentive_plan->evaluations          =  '';
			if ($request['incentive'] == "sales") {
				$incentive_plan->type               =  "Ventas";
			} elseif ($request['incentive'] == "elearning") {
				$incentive_plan->type               =  "E-learning";
			}
			$incentive_plan->score                =  $request['score'];
			$incentive_plan->start_date           =  $request['start_date'];
			if($request['is_end_date'] == "yes") {
				$incentive_plan->end_date           =  $request['end_date'];
			} else {
				$incentive_plan->end_date           =  null;
			}

			//Se crea y llena un array con los roles escogidos
			if(isset($request['supervisor'])) {
				$roles = ['name' => $request['supervisor'], 'status' => true];
			} else {
				$roles = ['name' => '', 'status' => false];
			}
			array_push($incentive_plan_roles, $roles);
			$roles = '';
			if(isset($request['seller'])) {
				$roles = ['name' => $request['seller'], 'status' => true];
			} else {
				$roles = ['name' => '', 'status' => false];
			}
			array_push($incentive_plan_roles, $roles);
			$roles = '';
			if(isset($request['promoter'])) {
				$roles = ['name' => $request['promoter'], 'status' => true];
				array_push($incentive_plan_roles, $roles);
				$roles = '';
			} else {
				$roles = ['name' => '', 'status' => false];
			}
			array_push($incentive_plan_roles, $roles);
			$roles = json_encode($incentive_plan_roles);
			$incentive_plan->roles = $roles;

			//Se crea y llena un array con los productos escogidos
			if (isset($request['all_products'])) {
				$incentive_plan->products = "all";
			} elseif (isset($request['product'])) {
				foreach ($request['product'] as $product){
					$product_array = ['id' => $product];
					array_push($incentive_plan_products, $product_array);
					$product_array = '';
				};
				$product_array = json_encode($incentive_plan_products);
				$incentive_plan->products = $product_array;
			}

			//Se crea y llena un array con las evaluaciones escogidas
			if (isset($request['all_evaluations'])) {
				$incentive_plan->evaluations = "all";
			} elseif (isset($request['evaluation'])) {
				foreach ($request['evaluation'] as $evaluation){
					$evaluation_array = ['id' => $evaluation];
					array_push($incentive_plan_evaluations, $evaluation_array);
					$evaluation_array = '';
				};
				$evaluation_array = json_encode($incentive_plan_evaluations);
				$incentive_plan->evaluations = $evaluation_array;
			}

			if ($incentive_plan->save()) {
				return $incentive_plan;
			}
		}

		/**
		 * Save a Incentive plan edited.
		 *
		 * @param  Request  $request
		 * @return incentive_plan
		 */

		public static function saveEdit($request, $incentive_plan_id) {

			$incentive_plan_roles                 =  [];
			$incentive_plan_products              =  [];
			$incentive_plan_evaluations           =  [];
			$incentive_plan                       =  IncentivePlan::find($incentive_plan_id);
			$incentive_plan->name                 =  ucwords($request['name']);
			$incentive_plan->data                 =  $request['editor1'];
			$incentive_plan->score                =  $request['score'];
			$incentive_plan->products             =  '';
			$incentive_plan->evaluations          =  '';
			if ($request['incentive'] == "sales") {
				$incentive_plan->type               =  "Ventas";
			} elseif ($request['incentive'] == "elearning") {
				$incentive_plan->type               =  "E-learning";
			}
			if(($request['start_date'] != null)) {
				$incentive_plan->start_date         =  $request['start_date'];
			}
			if($request['is_end_date'] == "yes") {
				$incentive_plan->end_date           =  $request['end_date'];
			} else {
				$incentive_plan->end_date           =  null;
			}

			//Se crea y llena un array con los roles escogidos
			if(isset($request['supervisor'])) {
				$roles = ['name' => $request['supervisor'], 'status' => true];
			} else {
				$roles = ['name' => '', 'status' => false];
			}
			array_push($incentive_plan_roles, $roles);
			$roles = '';
			if(isset($request['seller'])) {
				$roles = ['name' => $request['seller'], 'status' => true];
			} else {
				$roles = ['name' => '', 'status' => false];
			}
			array_push($incentive_plan_roles, $roles);
			$roles = '';
			if(isset($request['promoter'])) {
				$roles = ['name' => $request['promoter'], 'status' => true];
				array_push($incentive_plan_roles, $roles);
				$roles = '';
			} else {
				$roles = ['name' => '', 'status' => false];
			}
			array_push($incentive_plan_roles, $roles);
			$roles = json_encode($incentive_plan_roles);
			$incentive_plan->roles = $roles;

			//Se crea y llena un array con los productos escogidos
			if (isset($request['all_products'])) {
				$incentive_plan->products = "all";
				$incentive_plan->evaluations = '';
			} elseif (isset($request['product'])) {
				foreach ($request['product'] as $product){
					$product_array = ['id' => $product];
					array_push($incentive_plan_products, $product_array);
					$product_array = '';
				};
				$product_array = json_encode($incentive_plan_products);
				$incentive_plan->products = $product_array;
				$incentive_plan->evaluations = '';
			}

			//Se crea y llena un array con las evaluaciones escogidas
			if (isset($request['all_evaluations'])) {
				$incentive_plan->evaluations = "all";
				$incentive_plan->products    = '';
			} elseif (isset($request['evaluation'])) {
				foreach ($request['evaluation'] as $evaluation){
					$evaluation_array = ['id' => $evaluation];
					array_push($incentive_plan_evaluations, $evaluation_array);
					$evaluation_array = '';
				};
				$evaluation_array = json_encode($incentive_plan_evaluations);
				$incentive_plan->evaluations = $evaluation_array;
				$incentive_plan->products    = '';
			}

			if ($incentive_plan->save()) {
				return $incentive_plan;
			}
		}

		/**
		 * Active deactive a Incentive plan.
		 *
		 * @param  Request  $request
		 * @return incentive_plan
		 */

		public static function activeDeactive($incentive_plan_id) {

			$incentive_plan           = IncentivePlan::find($incentive_plan_id);
			if ($incentive_plan->is_active == true) {
				$incentive_plan->is_active = false;
			} else {
				$incentive_plan->is_active = true;
			}
			if ($incentive_plan->save()) {
				return $incentive_plan;
			}
		}

		/**
  * Save content edited.
  *
  * @return content
  */
  public static function storeContent($request, $incentive_plan_id) {
    $incentive_plan                    = IncentivePlan::find($incentive_plan_id);
    $incentive_plan->terms_conditions  = $request['editor1'];

    if ($incentive_plan->save()) {
      return $incentive_plan;
    }
  }
}