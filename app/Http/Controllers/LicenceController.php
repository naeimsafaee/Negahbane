<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Client_licence;
use App\Models\Licence;
use Illuminate\Http\Request;

class LicenceController extends Controller{

    public function index(Request $request){

        if ($request->wantsJson()){
            return _response(Licence::all() , "" , 200);
        } else {
            return view('licence.index');
        }
    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
    }

    public function show($id){
        $licence = Licence::query()->findOrFail($id);
        return _response($licence , "" , 200);
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){

    }

    public function destroy($id){
        //
    }

}
