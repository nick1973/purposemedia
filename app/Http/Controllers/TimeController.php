<?php

namespace App\Http\Controllers;

use App\Runners;
use App\Times;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Requests;

class TimeController extends Controller
{
    function store(Request $request){
        $validator = Validator::make($request->all(), [
            'time' => 'required',
            'runner_id' => 'required',
        ]);
        $input = $request->all();

        if ($validator->fails()) {
            return redirect('/home')
                ->withErrors($validator)
                ->withInput();
        }
        $runner_id = $request->input('runner_id');
        $runner = Runners::find($runner_id);
        //return $runner->id;
        DB::table('times')->insert(
            ['forename' => $runner->forename, 'surname' => $runner->surname, 'time' => $request->input('time')]
        );

        return redirect()->back()->with('message', 'Successfully Added!');
    }

    function destroy($id)
    {
        $time = Times::find($id);
        $time->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}
