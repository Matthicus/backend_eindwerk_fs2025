<?php

 namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $table = 'workouts';
    protected $primaryKey = "workout_id";

    public function exercises () {
        return $this->belongsToMany(Exercise::class, "workouts_exercises", "workout_id", "exercise_id");
    }

    public function progress () {
        return $this->hasMany(Progress::class);
    }
}
