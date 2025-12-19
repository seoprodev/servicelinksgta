<?php

namespace App\Http\Controllers\admin;

use App\Helpers\FakerURL;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $blog = new Blog();
        $blog->title        = $request->title;
        $blog->slug         = Str::slug($request->title);
        $blog->content      = $request->content;
        $blog->is_active    = $request->status;

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $filename   = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('uploads/blog');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $image->move($destinationPath, $filename);
            $blog->image = 'uploads/blog/' . $filename;
        }

        $blog->save();
        return redirect()->route('admin.manage.blog')->with('success', 'Blog created successfully.');
    }

    public function show($id)
    {
        $blog = Blog::findOrFail(FakerURL::id_d($id));
        return view('admin.blog.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail(FakerURL::id_d($id));
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $blog = Blog::findOrFail(FakerURL::id_d($id));
        $blog->title        = $request->title;
        $blog->slug         = Str::slug($request->title);
        $blog->content      = $request->content;
        $blog->is_active    = $request->status;


        // Replace old image
        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path('uploads/blog/' . $blog->image))) {
                unlink(public_path('uploads/blog/' . $blog->image));
            }

            $image      = $request->file('image');
            $imageName  = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/blog');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $image->move($destinationPath, $imageName);
            $blog->image = 'uploads/blog/' . $imageName;
        }

        $blog->save();

        return redirect()->route('admin.manage.blog')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail(FakerURL::id_d($id));
        $blog->delete();

        return redirect()->route('admin.manage.blog')->with('success', 'Blog deleted successfully.');
    }
}
