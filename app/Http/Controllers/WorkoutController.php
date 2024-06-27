<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    public function index(){
        $workouts = Workout::where('user_id', Auth::id())->get();
        $dates = $workouts->pluck('date');
        $values = $workouts->pluck('value');
        

        return view('workouts.index', compact('workouts', 'dates', 'values'));
    }

    public function create(){
        return view('workouts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'date' => 'required|date',
            'exercise' => 'required|string|max:255',
            'value' => 'required|integer',
            'perception' => 'required|string|max:255',
        ]);
        Workout::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'exercise' => $request->exercise,
            'value' => $request->value,
            'perception' => $request->perception,
        ]);
       
        return redirect()->route('workouts.index');
    }

    public function edit(Workout $workout){
        // ddd(Auth::id());
        // ddd($workout->user_id);
        if($workout->user_id != Auth::id()){
            abort(403, '許可されていないアクションです');
        }

        return view('workouts.edit', compact('workout'));
    }

    public function update(Request $request, Workout $workout)
    {
        if($workout->user_id != Auth::id()){
            abort(403, '許可されていないアクションです');
        }

        $request->validate([
            'date' => 'required|date',
            'exercise' => 'required|string|max:255',
            'value' => 'required|integer',
            'perception' => 'required|string|max:255',
        ]);

        $workout->update([
            'date' => $request->date,
            'exercise' => $request->exercise,
            'value' => $request->value,
            'perception' => $request->perception,
        ]);

        return redirect()->route('workouts.index');

    }


}
