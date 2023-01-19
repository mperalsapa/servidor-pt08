<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CArbon\Carbon;

class Athlete extends Model
{
    use HasFactory;
    protected $table = "athletes";

    public function age()
    {
        return Carbon::parse($this->attributes['birthdate'])->age;
    }

    public function deathdate()
    {
        if (isset($this->attributes['deathdate'])) {
            $date = date_create($this->attributes['deathdate']);
            return date_format($date, "d/m/Y");
        }
        return null;
    }
}
