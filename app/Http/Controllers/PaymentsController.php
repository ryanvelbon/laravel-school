<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Payment;

class PaymentsController extends Controller
{
	// No need for CRUD functionality.

    public function store(Request $request, $student_id){

    	$this->validate($request, [

        ]);

        $payment = new Payment;
        $payment->student_id = $student_id;
        $payment->amount = (int) $request->input('amount'); // is there need to type-cast?
        $payment->date = $request->input('payment-date');

        $payment->save();

        return redirect('/students/'.$student_id)->with('success', 'Payment Recorded!');
    }
}
