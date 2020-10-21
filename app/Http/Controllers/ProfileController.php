<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use DataTables;
use Redirect, Response;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee = User::where('employee_id', '=', auth()->user()->employee_id)
            ->join('departments', 'departments.department_id', '=', 'employees.department')
            ->first();
        return view('p.index')->with(compact('employee'));
    }

    public function getMaterial(Request $request)
    {
        if (request()->ajax()) {
            return datatables()->of(Material::select('*'))
                ->addColumn('action', 'action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('p.index');
    }

    public function store(Request $request)
    {
        $productId = $request->material_id;
        $product   =   Material::updateOrCreate(
            ['material_id' => $productId],
            [
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'department' => $request->department,
            ]
        );

        return Response::json($product);
    }

    public function edit($id)
    {
        $where = array('material_id' => $id);
        $product  = Material::where($where)->first();

        return Response::json($product);
    }

    public function destroy($id)
    {
        $product = Material::where('material_id', $id)->delete();
        return Response::json($product);
    }
}
