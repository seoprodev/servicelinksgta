<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function index()
    {
        return view('admin.priority.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $priorities = Priority::latest()->get();
            $data = [];

            foreach ($priorities as $key => $row) {
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
                        <a href="'.route('admin.priority.delete',$row->id).'" 
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

        Priority::create($request->only('name', 'status'));

        return response()->json(['success' => true, 'message' => 'Priority Created Successfully']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $priority = Priority::findOrFail($id);
        $priority->update($request->only('name', 'status'));

        return response()->json(['success' => true, 'message' => 'Priority Updated Successfully']);
    }

    public function destroy($id)
    {
        $priority = Priority::findOrFail($id);
        $priority->delete();

        return response()->json(['success' => true, 'message' => 'Priority Deleted Successfully']);
    }
}
