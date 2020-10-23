<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Redirect, Response;
use Illuminate\Support\Facades\Hash;
use App\User;

class CreateEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = \DB::table('employees')->join('roles', 'roles.role_id', '=', 'employees.role_id')
                ->join('departments', 'departments.department_id', '=', 'employees.department')
                ->select('*');
            return datatables()->of($data)
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip"  data-id="' . $row->employee_id . '" data-original-title="Edit">Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" id="delete-product" class="btn btn-danger btn-sm" role="button" aria-pressed="true" data-toggle="tooltip"  data-id="' . $row->employee_id . '" data-original-title="Delete">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('a.index');
    }

    public function store(Request $request)
    {
        $product = User::create($request->merge([
            'password' => Hash::make($request->password),
        ])->all());
        return Response::json($product);
    }
}
