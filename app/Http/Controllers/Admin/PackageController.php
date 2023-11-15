<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $data['packages'] = Package::all();

        return view('admin.landing_page.pricing.plans', $data);
    }

    public function create()
    {
        return view('admin.landing_page.pricing.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'order_of_appearance' => 'required',
            'price' => 'required',
            'details' => 'required'
        ]);

        $package = Package::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'order_of_appearance' => $request->order_of_appearance,
            'price' => $request->price,
            'discount' => $request->discount,
            'promo' => $request->promo,
            'details' => json_encode(array_filter($request->details))
        ]);

        if ($package) {
            return redirect()->route('packages.index')->with('success.create', 'Plan added successfully!');
        }

        return redirect()->back()->with('error', 'Something went wrong!');
    }

    public function edit(Package $package)
    {
        $data['package'] = $package;
        return view('admin.landing_page.pricing.edit', $data);
    }

    public function update(Package $package, Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'order_of_appearance' => 'required',
            'price' => 'required',
            'details' => 'required'
        ]);

        if ($package->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'order_of_appearance' => $request->order_of_appearance,
            'price' => $request->price,
            'discount' => $request->discount,
            'promo' => $request->promo,
            'details' => json_encode(array_filter($request->details))
        ])) {
            return redirect()->route('packages.index')->with('success.update', 'Plan updated successfully!');
        }

        return redirect()->back()->with('error', 'Something went wrong!');
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->back()->with('success.delete', 'Plan deleted successfully!');
    }
}
