<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer|min:1',
            'name' => 'nullable|string|max:32',
            'name_fr' => 'nullable|string|max:32',
            'slug' => 'nullable|string|max:32',
            'sort_order' => 'nullable|string|max:5',
        ]);
        $f_id = $request->id ?: null;
        $f_name = $request->name ?: null;
        $f_name_fr = $request->name_fr ?: null;
        $f_slug = $request->slug ?: null;
        $f_sort_order = $request->sort_order ?: null;

        $locations = Location::when($f_id, function ($query, $f_id) {
            return $query->where('id', 'like', '%' . $f_id . '%');
        })
            ->when($f_name, function ($query, $f_name) {
                return $query->where('name', 'like', '%' . $f_name . '%');
            })
            ->when($f_name_fr, function ($query, $f_name_fr) {
                return $query->where('name_fr', 'like', '%' . $f_name_fr . '%');
            })
            ->when($f_slug, function ($query, $f_slug) {
                return $query->where('slug', 'like', '%' . $f_slug . '%');
            })
            ->when($f_sort_order, function ($query, $f_sort_order) {
                return $query->where('sort_order', 'like', '%' . $f_sort_order . '%');
            })
            ->orderBy('id')
            ->orderBy('sort_order')
            ->paginate(20)
            ->withQueryString();

        return view('Admin.locations.index', [
            'f_id' => $f_id,
            'f_name' => $f_name,
            'f_name_fr' => $f_name_fr,
            'f_slug' => $f_slug,
            'f_sort_order' => $f_sort_order,
            'locations' => $locations,
        ]);
    }


    public function create(Request $slug)
    {
        $location = Location::where('slug', $slug)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.locations.create', [
            'location' => $location
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:32',
            'name_fr'=>'required|string|max:32',
            'slug'=>'required|string|max:32',
            'sort_order'=>'required|string|max:5',
        ]);

        // location
        $location = new Location();
        $location->name = $request->name;
        $location->name_fr = $request->name_fr;
        $location->slug = $request->slug;
        $location->sort_order = $request->sort_order;
        $location->save();


        $success = trans('app.store-response', ['name' => $location->name]);
        return redirect()->route('admin.locations.index', $location->slug)
            ->with([
                'success' => $success,
            ]);
    }

    public function edit($slug)
    {
        $location = Location::where('slug', $slug)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->first();

        return view('admin.locations.edit', [
            'location' => $location
        ]);
    }

    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $slug)
    {
        $location = Location::where('slug', $slug)
            ->firstOrFail();
        $request->validate([
            'name'=>'required|string|max:32',
            'name_fr'=>'required|string|max:32',
            'slug'=>'required|string|max:32',
            'sort_order'=>'required|string|max:5',
        ]);

        // location
        $location->name = $request->name;
        $location->name_fr = $request->name_fr;
        $location->slug = $request->slug;
        $location->sort_order = $request->sort_order;
        $location->update();


        $success = trans('app.store-response', ['name' => $location->name]);
        return redirect()->route('admin.locations.index', $location->slug)
            ->with([
                'success' => $success,
            ]);
    }

    public function delete($slug)
    {
        $location = Location::where('slug', $slug)
            ->firstOrFail();
        $success = trans('app.delete-response', ['name' => $location->name]);
        $location->delete();

        return redirect()->route('admin.locations.index')
            ->with([
                'success' => $success,
            ]);
    }
}
