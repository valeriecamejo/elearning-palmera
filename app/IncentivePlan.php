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

}