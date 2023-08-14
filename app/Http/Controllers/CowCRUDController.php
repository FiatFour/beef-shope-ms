<?php

namespace App\Http\Controllers;

use App\Models\Cow;
use Illuminate\Http\Request;

class CowCRUDController extends Controller
{
    //Create Index
    public function index(){
        $data['cows'] = Cow::orderBy('cow_id', 'desc') -> paginate(5);
        return view('cows.index', $data);
    }

    //Create resource
    public function create(){
        return view('cows.create');
    }

    //Store resource
    public function store(Request $request){
        $request -> validate([
            'cow_gene' => 'required',
            'cow_birth' => 'required'
        ]);

        $cow = new Cow;
        $cow -> cow_gene = $request -> cow_gene;
        $cow -> cow_birth = $request -> cow_birth;
        $cow -> save();
        return redirect() -> route('cows.index') -> with('success', 'Cows has been created successfully.');
    }

     //Edit resource
     public function edit(Cow $cow){
         return view('cows.edit', compact('cow'));
     }

     //Update resource
     public function update(Request $request, $cow_id){
        $request->validate([
            'cow_gene' => 'required',
            'cow_birth' => 'required'
        ]);
        $cow = Cow::find($cow_id);
        $cow->cow_gene = $request->cow_gene;
        $cow->cow_birth = $request->cow_birth;
        $cow->save();
        return redirect() -> route('cows.index') -> with('success', 'Cow has been updated successfully');
     }

    //Delete resource
    public function destroy(Cow $cow){
        $cow->delete();
        return redirect() -> route('cows.index') -> with('success', 'Cow has been deleted successfully');
    }
}
