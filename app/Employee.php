<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
      protected $guarded = [];

        public function FindCompany()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }
}
