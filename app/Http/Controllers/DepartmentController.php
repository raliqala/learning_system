<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Material;
use DataTables;
use Redirect, Response;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function it_department()
    {
        $results = \DB::table('categories')->where('belongTo', '=', 'it')->get();
        $post = Material::get();
        return view('pages.itDep')->with(compact('results', 'post'));
    }

    public function creative()
    {
        $results = \DB::table('categories')->where('belongTo', '=', 'create')->get();
        $post = Material::get();
        return view('pages.creativeDep')->with(compact('results', 'post'));
    }

    public function customerService()
    {
        $results = \DB::table('categories')->where('belongTo', '=', 'cust')->get();
        $post = Material::get();
        return view('pages.custDep')->with(compact('results', 'post'));
    }

    public function postInformation($id)
    {
        $where = array('material_id' => $id);
        $product  = Material::where($where)
        ->join('categories', 'categories.category_id', '=', 'learning_material.category_id')
        ->join('departments', 'departments.department_id', '=', 'learning_material.department')
        ->join('employees', 'employees.employee_id', '=', 'learning_material.employee_id')
        ->first();

        return Response::json($product);
    }

}
