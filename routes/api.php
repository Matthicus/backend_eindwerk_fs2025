<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Workout;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test-workouts', function () {
    $workouts = Workout::all();
    return response()->json($workouts);
});

Route::get('/workouts/{id}', function ($id) {
    $workout = Workout::with('exercises')->find($id);
   if (!$workout) {
  return response()->json(["error" => "Workout not found"], 404);
   }

   return response()->json($workout);

});