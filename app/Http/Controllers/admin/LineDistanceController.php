<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LineDistance;
use Illuminate\Http\Request;

class LineDistanceController extends Controller
{
    public function index()
    {
        return view('admin.line-distance.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $distances = LineDistance::latest()->get();
            $data = [];

            foreach ($distances as $key => $row) {
                $data[] = [
                    'index'      => $key + 1,
                    'id'         => $row->id,
                    'name'       => $row->name,
                    'status'     => $row->status ? 'Active' : 'Inactive',
                    'created_at' => $row->created_at->format('d-m-Y'),
                    'action'     => '
                        <button class="btn btn-sm btn-primary btn-edit" 
                                data-id="'.$row->id.'" 
                                data-name="'.$row->name.'" 
                                data-status="'.$row->status.'">Edit</button>
                        <a href="'.route('admin.linedistance.delete',$row->id).'" 
                           class="btn btn-sm btn-danger btn-delete">Delete</a>
                    '
                ];
            }

            return response()->json(['data' => $data]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        LineDistance::create($request->only('name', 'status'));

        return response()->json(['success' => true, 'message' => 'Line Distance Created Successfully']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $distance = LineDistance::findOrFail($id);
        $distance->update($request->only('name', 'status'));

        return response()->json(['success' => true, 'message' => 'Line Distance Updated Successfully']);
    }

    public function destroy($id)
    {
        $distance = LineDistance::findOrFail($id);
        $distance->delete();

        return response()->json(['success' => true, 'message' => 'Line Distance Deleted Successfully']);
    }
}
