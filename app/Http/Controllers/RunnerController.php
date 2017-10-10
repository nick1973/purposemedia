<?php

namespace App\Http\Controllers;

use App\Runners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class RunnerController extends Controller
{
    function index(){
        $runners = DB::table('runners')->paginate(20);
        return view('runners.index', compact('runners'));
    }

    function store(Request $request){
        $validator = Validator::make($request->all(), [
            'forename' => 'required|max:255',
            'surname' => 'required|max:255',
        ]);
        $input = $request->all();

        if ($validator->fails()) {
            return redirect('/runners')
                ->withErrors($validator)
                ->withInput();
        }
        Runners::create($input);
        return redirect()->back()->with('message', 'Successfully Created!');
    }

    function edit($id)
    {
        $runner = Runners::find($id);
        return view('runners.edit', compact('runner'));
    }

    function update(Request $request, $id)
    {
        $runner = Runners::find($id);
        $input = $request->all();
        $runner->update($input);
        return redirect()->back()->with('message', 'Successfully Edited!');
    }

    function destroy($id)
    {
        $runner = Runners::find($id);
        $runner->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}
