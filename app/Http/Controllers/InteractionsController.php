<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interaction;

class InteractionsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
      
        ]);

        $student_id = (int) $request->input('student-id');

        $interaction = new Interaction;

        $interaction->student_id = $student_id;
        $interaction->interaction_type_id = (int) $request->input('interaction-type');
        $interaction->with_parent = (boolean) $request->input('with-parent');
        $interaction->text = $request->input('text');
        $interaction->date = $request->input('interaction-date');

        $interaction->save();

        return redirect('/students/'.$student_id)->with('success', 'Interaction Recorded!');
    }
}
