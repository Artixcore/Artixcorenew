<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FrontendContent;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function hero_section_title()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $data['frontend_content'] = FrontendContent::where('name', 'hero_section_title')->first();

            return view('admin.landing_page.hero_section.title', $data);
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function hero_section_title_update(Request $request)
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
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
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function hero_section_categories()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $data['frontend_contents'] = FrontendContent::where('name', 'like', 'hero_section_category_%')->get();
            $data['count'] = FrontendContent::where('name', 'like', 'hero_section_category_%')->count();
    
            return view('admin.landing_page.hero_section.categories', $data);
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function hero_section_categories_update(Request $request)
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $validated = $request->validate([
                'order_of_appearance' => 'required',
                'hero_section_category' => 'required',
                'title' => 'required',
                'icon' => 'required',
                'link' => 'required'
            ]);
    
            $content = [
                "title" => $request->title,
                'icon' => $request->icon,
                'link' => $request->link
            ];
    
            $frontend_content = FrontendContent::updateOrCreate(
                [
                    'name' => $request->hero_section_category
                ],
                [
                    'order_of_appearance' => $request->order_of_appearance,
                    'contents' => json_encode($content)
                ]
            );
    
            return redirect()->back()->with('success', 'Data updated successfully!');
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function our_values_title()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $data['frontend_content'] = FrontendContent::where('name', 'our_values_title')->first();

            return view('admin.landing_page.our_values.title', $data);
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function our_values_title_update(Request $request)
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
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
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function our_values_sections()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $data['frontend_contents'] = FrontendContent::where('name', 'like', 'our_values_section_%')->get();
            $data['count'] = FrontendContent::where('name', 'like', 'our_values_section_%')->count();
    
            return view('admin.landing_page.our_values.sections', $data);
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function our_values_sections_update(Request $request)
    {   
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $validated = $request->validate([
                'order_of_appearance' => 'required',
                'our_values_section' => 'required',
                'title' => 'required',
                'description' => 'required'
            ]);
    
            $content = [
                "title" => $request->title,
                'description' => $request->description
            ];
    
            $frontend_content = FrontendContent::updateOrCreate(
                [
                    'name' => $request->our_values_section
                ],
                [
                    'order_of_appearance' => $request->order_of_appearance,
                    'contents' => json_encode($content)
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
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function about_us_title()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $data['frontend_content'] = FrontendContent::where('name', 'about_us_title')->first();

            return view('admin.landing_page.about_us.title', $data);
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function about_us_title_update(Request $request)
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
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
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function our_services_title()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $data['frontend_content'] = FrontendContent::where('name', 'our_services_title')->first();

            return view('admin.landing_page.our_services.title', $data);
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function our_services_title_update(Request $request)
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
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
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function our_services_services()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $data['frontend_contents'] = FrontendContent::where('name', 'like', 'our_services_service_%')->get();
            $data['count'] = FrontendContent::where('name', 'like', 'our_services_service_%')->count();
    
            return view('admin.landing_page.our_services.services', $data);
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function our_services_services_update(Request $request)
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
        $validated = $request->validate([
            'order_of_appearance' => 'required',
            'our_services_service' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        
        $content = [
            "title" => $request->title,
            "icon" => $request->icon,
            'description' => $request->description
        ];

        $frontend_content = FrontendContent::updateOrCreate(
            [
                'name' => $request->our_services_service
            ],
            [
                'order_of_appearance' => $request->order_of_appearance,
                'contents' => json_encode($content)
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
    else{
        return redirect('login')->with('error', 'You are not authorized to access this page!');
    }
    }

    public function testimonials_title()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $data['frontend_content'] = FrontendContent::where('name', 'testimonials_title')->first();

            return view('admin.landing_page.testimonials.title', $data);
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function testimonials_title_update(Request $request)
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
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
    else{
        return redirect('login')->with('error', 'You are not authorized to access this page!');
    }
    }

    public function testimonials_testimonials()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $data['frontend_contents'] = FrontendContent::where('name', 'like', 'testimonials_testimonial_%')->get();
            $data['count'] = FrontendContent::where('name', 'like', 'testimonials_testimonial_%')->count();
    
            return view('admin.landing_page.testimonials.testimonials', $data);
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function testimonials_testimonials_update(Request $request)
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
        $validated = $request->validate([
            'order_of_appearance' => 'required',
            'testimonials_testimonial' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'rating' => 'required',
            'review' => 'required'
        ]);

        $content = [
            "name" => $request->name,
            'designation' => $request->designation,
            'rating' => $request->rating,
            'review' => $request->review
        ];

        $frontend_content = FrontendContent::updateOrCreate(
            [
                'name' => $request->testimonials_testimonial
            ],
            [
                'order_of_appearance' => $request->order_of_appearance,
                'contents' => json_encode($content)
            ]
        );

        return redirect()->back()->with('success', 'Data updated successfully!');
    }
    else{
        return redirect('login')->with('error', 'You are not authorized to access this page!');
    }
    }

    public function portfolio_title()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $data['frontend_content'] = FrontendContent::where('name', 'portfolio_title')->first();

            return view('admin.landing_page.portfolio.title', $data);
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function portfolio_title_update(Request $request)
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
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
    else{
        return redirect('login')->with('error', 'You are not authorized to access this page!');
    }
    }

    public function portfolio_projects()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $data['frontend_contents'] = FrontendContent::where('name', 'like', 'portfolio_project_%')->get();
            $data['count'] = FrontendContent::where('name', 'like', 'portfolio_project_%')->count();
    
            return view('admin.landing_page.portfolio.projects', $data);
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function portfolio_projects_update(Request $request)
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
        $validated = $request->validate([
            'order_of_appearance' => 'required',
            'portfolio_project' => 'required',
            'title' => 'required',
            'link' => 'required',
            'description' => 'required'
        ]);

        $content = [
            "title" => $request->title,
            'link' => $request->link,
            'description' => $request->description
        ];

        $frontend_content = FrontendContent::updateOrCreate(
            [
                'name' => $request->portfolio_project
            ],
            [
                'order_of_appearance' => $request->order_of_appearance,
                'contents' => json_encode($content)
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
    else{
        return redirect('login')->with('error', 'You are not authorized to access this page!');
    }
    }

    public function pricing_title()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $data['frontend_content'] = FrontendContent::where('name', 'pricing_title')->first();

            return view('admin.landing_page.pricing.title', $data);
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function pricing_title_update(Request $request)
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
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
    else{
        return redirect('login')->with('error', 'You are not authorized to access this page!');
    }
    }

    public function faq_title()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $data['frontend_content'] = FrontendContent::where('name', 'faq_title')->first();

            return view('admin.landing_page.faq.title', $data);
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function faq_title_update(Request $request)
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
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
    else{
        return redirect('login')->with('error', 'You are not authorized to access this page!');
    }
    }

    public function faq_faqs()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
            $data['frontend_contents'] = FrontendContent::where('name', 'like', 'faq_faq_%')->get();
            $data['count'] = FrontendContent::where('name', 'like', 'faq_faq_%')->count();
    
            return view('admin.landing_page.faq.faqs', $data);
        }
        else{
            return redirect('login')->with('error', 'You are not authorized to access this page!');
        }
    }

    public function faq_faqs_update(Request $request)
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'editor'){
        $validated = $request->validate([
            'order_of_appearance' => 'required',
            'faq_faq' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $content = [
            "title" => $request->title,
            'description' => $request->description
        ];

        $frontend_content = FrontendContent::updateOrCreate(
            [
                'name' => $request->faq_faq
            ],
            [
                'order_of_appearance' => $request->order_of_appearance,
                'contents' => json_encode($content)
            ]
        );

        return redirect()->back()->with('success', 'Data updated successfully!');
    }
    else{
        return redirect('login')->with('error', 'You are not authorized to access this page!');
    }
    }
}
