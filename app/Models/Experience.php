<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $guarded =['id']; 


    public function getStartDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m', $value)->translatedFormat('F Y');
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m', $value)->translatedFormat('F Y');
    }
    
    public function getDurationAttribute($value)
    {
        
        return $this->start_date . ' - ' . $this->end_date;
    }

    // public function getDescriptionAttribute($value)
    // {
    //     return explode('//',$value);
    // }

}
