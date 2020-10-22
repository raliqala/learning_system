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
            $data = Material::where('employee_id', auth()->user()->employee_id)->get();
            return datatables()->of($data)
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm edit-product" role="button" aria-pressed="true" data-toggle="tooltip"  data-id="' . $row->material_id . '" data-original-title="Edit">Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" id="delete-product" class="btn btn-danger btn-sm" role="button" aria-pressed="true" data-toggle="tooltip"  data-id="' . $row->material_id . '" data-original-title="Delete">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'description'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('p.index');
    }

    public function store(Request $request)
    {

        if ($request->hasFile('material_image')) {
            //get filename with extension
            $fileNameWithExt = $request->file('material_image')->getClientOriginalName();
           //get file name
           $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
           //get file ext
           $extension = $request->file('material_image')->getClientOriginalExtension();
           //file name to store
           $fileToStore = $filename."_".time().".".$extension;
           //upload image
           $path = $request->file('material_image')->storeAs('public/images', $fileToStore);
           
        }else{
            $fileToStore = "noimage.jpg";
        }

        // $product =  Material::create($request->merge([
        //     'employee_id' => auth()->user()->employee_id,
        //     'file' => $path,
        // ])->all());

        $material_id = $request->product_id;
        $product = Material::updateOrCreate( 
            ['employee_id' => auth()->user()->employee_id, 'material_id' => $material_id],
            $request->all(),
        );

        return Response::json($product);
    }

    public function edit($id)
    {
        $where = array('material_id' => $id);
        $product  = Material::where($where)
        ->join('categories', 'categories.category_id', '=', 'learning_material.category_id')
        ->join('departments', 'departments.department_id', '=', 'learning_material.department')
        ->first();

        return Response::json($product);
    }

    public function destroy($id)
    {
        $data = Material::where('material_id',$id)->first(['file']);
        \File::delete('public/images/'.$data->image);
        $product = Material::where('material_id',$id)->delete();
    
        return Response::json($product);
    }
}
