<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function store(Request $request){
        $data= $this->validate($request,[
            'deb_name'=>'required',
            'parent'=>'sometimes|nullable|numeric',
            'description'=>'sometimes|nullable',
            'keyword'=>'sometimes|nullable',
        ]);
        Department::create($data);
        return redirect(url('/'));
    }
}
