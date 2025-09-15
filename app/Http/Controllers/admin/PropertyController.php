<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;
//use Yajra\DataTables\Facades\DataTables;

class PropertyController extends Controller
{
    // Show blade page
    public function index()
    {
        return view('admin.property.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $types = PropertyType::latest()->get();
            $data = [];

            foreach ($types as $key => $row) {
                $data[] = [
                    'index'     => $key + 1,
                    'id'        => $row->id,
                    'name'      => $row->name,
                    'status'    => $row->status ? 'Active' : 'Inactive',
                    'created_at'=> $row->created_at->format('d-m-Y'),
                    'action'    => '
                    <button class="btn btn-sm btn-primary btn-edit" 
                            data-id="'.$row->id.'" 
                            data-name="'.$row->name.'" 
                            data-status="'.$row->status.'">Edit</button>
                    <a href="'.route('admin.property.delete',$row->id).'" 
                       class="btn btn-sm btn-danger btn-delete">Delete</a>
                '
                ];
            }

            return response()->json(['data' => $data]);
        }
    }

    // Store new record
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        PropertyType::create($request->only('name','status'));

        return response()->json(['success' => true, 'message' => 'Property Type Created Successfully']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $type = PropertyType::findOrFail($id);
        $type->update($request->only('name','status'));

        return response()->json(['success' => true, 'message' => 'Property Type Updated Successfully']);
    }

    public function destroy($id)
    {
        $type = PropertyType::findOrFail($id);
        $type->delete();

        return response()->json(['success' => true, 'message' => 'Property Type Deleted Successfully']);
    }
}
