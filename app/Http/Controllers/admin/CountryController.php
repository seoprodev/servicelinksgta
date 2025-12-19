<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return view('admin.location.index');
    }

    public function data()
    {
        $countries = Country::latest()->get();

        $data = $countries->map(function ($country, $key) {
            return [
                'index'       => $key + 1,
                'postal_code' => $country->postal_code,
                'state'       => $country->state,
                'city'        => $country->city,
                'country'     => $country->country,
                'created_at'  => $country->created_at->format('Y-m-d'),
                'action'      => '
                    <button class="btn btn-sm btn-info btn-edit" 
                        data-id="'.$country->id.'" 
                        data-postal="'.$country->postal_code.'" 
                        data-state="'.$country->state.'" 
                        data-city="'.$country->city.'" 
                        data-country="'.$country->country.'">
                        Edit
                    </button>
                    <a href="'.route('admin.country.delete', $country->id).'" 
                        class="btn btn-sm btn-danger btn-delete">Delete</a>
                ',
            ];
        });

        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'postal_code' => 'required|string|max:20',
            'state'       => 'required|string|max:255',
            'city'        => 'required|string|max:255',
            'country'     => 'required|string|max:255',
        ]);

        Country::create($request->only('postal_code', 'state', 'city', 'country'));

        return response()->json(['message' => 'Country added successfully!']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'postal_code' => 'required|string|max:20',
            'state'       => 'required|string|max:255',
            'city'        => 'required|string|max:255',
            'country'     => 'required|string|max:255',
        ]);

        $country = Country::findOrFail($id);
        $country->update($request->only('postal_code', 'state', 'city', 'country'));

        return response()->json(['message' => 'Country updated successfully!']);
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return response()->json(['message' => 'Country deleted successfully!']);
    }
}