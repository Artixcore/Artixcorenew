<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FrontendContent;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function hero_section_title()
    {
        $data['frontend_content'] = FrontendContent::where('name', 'hero_section_title')->first();

        return view('admin.landing_page.hero_section.title', $data);
    }

    public function hero_section_title_update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'description' => 'required',
            'meta_description' => 'required'
        ]);

        $frontend_content = FrontendContent::updateOrCreate(
            [
                'name' => 'hero_section_title'
            ],
            [
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'description' => $request->description,
                'meta_description' => $request->meta_description
            ]
        );

        if ($request->hasFile('image')) {
            @unlink($frontend_content->image);

            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-' . $extension;
            $file->move('uploads/', $filename);

            $frontend_content->update([
                'image' => 'uploads/' . $filename,
            ]);
        }

        return redirect()->back()->with('success', 'Data updated successfully!');
    }

    public function our_values_title()
    {
        $data['frontend_content'] = FrontendContent::where('name', 'our_values_title')->first();

        return view('admin.landing_page.our_values.title', $data);
    }

    public function our_values_title_update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'description' => 'required',
            'meta_description' => 'required'
        ]);

        $frontend_content = FrontendContent::updateOrCreate(
            [
                'name' => 'our_values_title'
            ],
            [
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'description' => $request->description,
                'meta_description' => $request->meta_description
            ]
        );

        return redirect()->back()->with('success', 'Data updated successfully!');
    }

    public function about_us_title()
    {
        $data['frontend_content'] = FrontendContent::where('name', 'about_us_title')->first();

        return view('admin.landing_page.about_us', $data);
    }

    public function about_us_title_update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'description' => 'required',
            'meta_description' => 'required'
        ]);

        $frontend_content = FrontendContent::updateOrCreate(
            [
                'name' => 'about_us_title'
            ],
            [
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'description' => $request->description,
                'meta_description' => $request->meta_description
            ]
        );

        return redirect()->back()->with('success', 'Data updated successfully!');
    }

    public function our_services_title()
    {
        $data['frontend_content'] = FrontendContent::where('name', 'our_services_title')->first();

        return view('admin.landing_page.our_services.title', $data);
    }

    public function our_services_title_update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'description' => 'required',
            'meta_description' => 'required'
        ]);

        $frontend_content = FrontendContent::updateOrCreate(
            [
                'name' => 'our_services_title'
            ],
            [
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'description' => $request->description,
                'meta_description' => $request->meta_description
            ]
        );

        return redirect()->back()->with('success', 'Data updated successfully!');
    }

    public function testimonials_title()
    {
        $data['frontend_content'] = FrontendContent::where('name', 'testimonials_title')->first();

        return view('admin.landing_page.testimonials.title', $data);
    }

    public function testimonials_title_update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'description' => 'required',
            'meta_description' => 'required'
        ]);

        $frontend_content = FrontendContent::updateOrCreate(
            [
                'name' => 'testimonials_title'
            ],
            [
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'description' => $request->description,
                'meta_description' => $request->meta_description
            ]
        );

        return redirect()->back()->with('success', 'Data updated successfully!');
    }

    public function portfolio_title()
    {
        $data['frontend_content'] = FrontendContent::where('name', 'portfolio_title')->first();

        return view('admin.landing_page.portfolio.title', $data);
    }

    public function portfolio_title_update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'description' => 'required',
            'meta_description' => 'required'
        ]);

        $frontend_content = FrontendContent::updateOrCreate(
            [
                'name' => 'portfolio_title'
            ],
            [
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'description' => $request->description,
                'meta_description' => $request->meta_description
            ]
        );

        return redirect()->back()->with('success', 'Data updated successfully!');
    }

    public function pricing_title()
    {
        $data['frontend_content'] = FrontendContent::where('name', 'pricing_title')->first();

        return view('admin.landing_page.pricing.title', $data);
    }

    public function pricing_title_update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'description' => 'required',
            'meta_description' => 'required'
        ]);

        $frontend_content = FrontendContent::updateOrCreate(
            [
                'name' => 'pricing_title'
            ],
            [
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'description' => $request->description,
                'meta_description' => $request->meta_description
            ]
        );

        return redirect()->back()->with('success', 'Data updated successfully!');
    }

    public function faq_title()
    {
        $data['frontend_content'] = FrontendContent::where('name', 'faq_title')->first();

        return view('admin.landing_page.faq.title', $data);
    }

    public function faq_title_update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'description' => 'required',
            'meta_description' => 'required'
        ]);

        $frontend_content = FrontendContent::updateOrCreate(
            [
                'name' => 'faq_title'
            ],
            [
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'description' => $request->description,
                'meta_description' => $request->meta_description
            ]
        );

        return redirect()->back()->with('success', 'Data updated successfully!');
    }
}
