<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FakerURL;
use App\Http\Controllers\Controller;
use App\Models\SubscriptionPackage;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = SubscriptionPackage::where('is_deleted', 0)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.packages.index', compact('packages'));
    }

    public function show($id)
    {
        $package = SubscriptionPackage::where('id', FakerURL::id_d($id))
            ->where('is_deleted', 0)
            ->firstOrFail();

        return view('admin.packages.show', compact('package'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'price'         => 'required|numeric|min:0',
            'billing_cycle' => 'required|in:monthly,yearly',
//            'job_post_limit'=> 'nullable|integer|min:0',
            'connects'      => 'nullable|integer|min:0',
            'features'      => 'nullable|array',
            'is_featured'   => 'nullable|boolean',
            'is_active'     => 'nullable|boolean',
        ]);

        SubscriptionPackage::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'price'         => $request->price,
            'billing_cycle' => $request->billing_cycle,
            'job_post_limit'=> $request->job_post_limit,
            'connects'      => $request->connects,
            'features'      => $request->features,
            'is_featured'   => $request->is_featured ?? 0,
            'is_active'     => $request->is_active ?? 1,
        ]);

        return redirect()->route('admin.manage.package')->with('success', 'Package created successfully.');
    }

    public function edit($id)
    {
        $package = SubscriptionPackage::where('id', FakerURL::id_d($id))
            ->where('is_deleted', 0)
            ->firstOrFail();

        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'price'         => 'required|numeric|min:0',
            'billing_cycle' => 'required|in:monthly,yearly',
            'job_post_limit'=> 'nullable|integer|min:0',
            'connects'      => 'nullable|integer|min:0',
            'features'      => 'nullable|array',
            'is_featured'   => 'nullable|boolean',
            'is_active'     => 'nullable|boolean',
        ]);

        $package = SubscriptionPackage::where('id', FakerURL::id_d($id))
            ->where('is_deleted', 0)
            ->firstOrFail();

        $package->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'price'         => $request->price,
            'billing_cycle' => $request->billing_cycle,
            'job_post_limit'=> $request->job_post_limit,
            'connects'      => $request->connects,
            'features'      => $request->features,
            'is_featured'   => $request->is_featured ?? 0,
            'is_active'     => $request->is_active ?? 1,
        ]);

        return redirect()->route('admin.manage.package')->with('success', 'Package updated successfully.');
    }

    public function destroy($id)
    {
        $package = SubscriptionPackage::where('id', FakerURL::id_d($id))
            ->where('is_deleted', 0)
            ->firstOrFail();

        $package->update(['is_deleted' => 1]);

        return redirect()->route('admin.manage.package')->with('success', 'Package deleted successfully.');
    }
}
