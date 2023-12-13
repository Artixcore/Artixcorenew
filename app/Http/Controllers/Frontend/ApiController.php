<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\FrontendContent;
use App\Models\Admin\Package;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function get_landing_page_data()
    {
        $data = FrontendContent::all();

        $hero_sections = FrontendContent::where('name', 'like', 'hero_section_category_%')->orderBy('order_of_appearance')->get();
        $hero_section_sub_sections = [];
        foreach ($hero_sections as $section) {
            $json_data = json_decode($section->contents);
            $hero_section_sub_sections[] = [
                'title' => $json_data->title,
                'icon' => $json_data->icon,
                'link' => $json_data->link
            ];
        }

        $our_values = FrontendContent::where('name', 'like', 'our_values_section_%')->orderBy('order_of_appearance')->get();
        $our_value_sub_sections = [];
        foreach ($our_values as $section) {
            $json_data = json_decode($section->contents);
            $our_value_sub_sections[] = [
                'title' => $json_data->title,
                'description' => $json_data->description,
            ];
        }

        $our_services = FrontendContent::where('name', 'like', 'our_services_service_%')->orderBy('order_of_appearance')->get();
        $our_services_sub_sections = [];
        foreach ($our_services as $section) {
            $json_data = json_decode($section->contents);
            $our_services_sub_sections[] = [
                'title' => $json_data->title,
                'icon' => $json_data->icon,
                'description' => $json_data->description,
            ];
        }

        $testimonials = FrontendContent::where('name', 'like', 'testimonials_testimonial_%')->orderBy('order_of_appearance')->get();
        $testimonials_sub_sections = [];
        foreach ($testimonials as $section) {
            $json_data = json_decode($section->contents);
            $testimonials_sub_sections[] = [
                'name' => $json_data->name,
                'designation' => $json_data->designation,
                'rating' => intval($json_data->rating),
                'review' => $json_data->review,
            ];
        }

        $portfolio = FrontendContent::where('name', 'like', 'portfolio_project_%')->orderBy('order_of_appearance')->get();
        $portfolio_sub_sections = [];
        foreach ($portfolio as $section) {
            $json_data = json_decode($section->contents);
            $portfolio_sub_sections[] = [
                'title' => $json_data->title,
                'link' => $json_data->link,
                'description' => $json_data->description,
            ];
        }

        $packages = Package::orderBy('order_of_appearance')->get();
        $package_plans = [];
        foreach ($packages as $package) {
            $json_data = json_decode($package->details);
            $package_plans[] = [
                'title' => $package->title,
                'subtitle' => $package->subtitle,
                'price' => $package->price,
                'details' => $json_data
            ];
        }

        $faqs = FrontendContent::where('name', 'like', 'faq_faq_%')->orderBy('order_of_appearance')->get();
        $faq_sub_sections = [];
        foreach ($faqs as $section) {
            $json_data = json_decode($section->contents);
            $faq_sub_sections[] = [
                'title' => $json_data->title,
                'description' => $json_data->description,
            ];
        }

        return response()->json([
            'hero_section' => [
                "title" => $data->where('name', 'hero_section_title')->first()->title,
                "meta_title" => $data->where('name', 'hero_section_title')->first()->meta_title,
                "description" => $data->where('name', 'hero_section_title')->first()->description,
                "meta_description" => $data->where('name', 'hero_section_title')->first()->meta_description,
                "banner" => $data->where('name', 'hero_section_title')->first()->image,
                "sub-sections" => $hero_section_sub_sections
            ],
            'our_values_section' => [
                "title" => $data->where('name', 'our_values_title')->first()->title,
                "meta_title" => $data->where('name', 'our_values_title')->first()->meta_title,
                "description" => $data->where('name', 'our_values_title')->first()->description,
                "meta_description" => $data->where('name', 'our_values_title')->first()->meta_description,
                "sub-sections" => $our_value_sub_sections
            ],
            'about_us_section' => [
                "title" => $data->where('name', 'about_us_title')->first()->title,
                "meta_title" => $data->where('name', 'about_us_title')->first()->meta_title,
                "description" => $data->where('name', 'about_us_title')->first()->description,
                "meta_description" => $data->where('name', 'about_us_title')->first()->meta_description
            ],
            'our_services_section' => [
                "title" => $data->where('name', 'our_services_title')->first()->title,
                "meta_title" => $data->where('name', 'our_services_title')->first()->meta_title,
                "description" => $data->where('name', 'our_services_title')->first()->description,
                "meta_description" => $data->where('name', 'our_services_title')->first()->meta_description,
                "sub-sections" => $our_services_sub_sections
            ],
            'portfolio_section' => [
                "title" => $data->where('name', 'portfolio_title')->first()->title,
                "meta_title" => $data->where('name', 'portfolio_title')->first()->meta_title,
                "description" => $data->where('name', 'portfolio_title')->first()->description,
                "meta_description" => $data->where('name', 'portfolio_title')->first()->meta_description,
                "sub-sections" => $portfolio_sub_sections
            ],
            'pricing_section' => [
                "title" => $data->where('name', 'pricing_title')->first()->title,
                "meta_title" => $data->where('name', 'pricing_title')->first()->meta_title,
                "description" => $data->where('name', 'pricing_title')->first()->description,
                "meta_description" => $data->where('name', 'pricing_title')->first()->meta_description,
                "plans" => $package_plans
            ],
            'faq_section' => [
                "title" => $data->where('name', 'faq_title')->first()->title,
                "meta_title" => $data->where('name', 'faq_title')->first()->meta_title,
                "description" => $data->where('name', 'faq_title')->first()->description,
                "meta_description" => $data->where('name', 'faq_title')->first()->meta_description,
                "sub-sections" => $faq_sub_sections
            ],
        ]);
    }
    // saparate every single section in a different function
    public function hero_section(){
        $data = FrontendContent::all();
        $hero_sections = FrontendContent::where('name', 'like', 'hero_section_category_%')->orderBy('order_of_appearance')->get();
        $hero_section_sub_sections = [];
        foreach ($hero_sections as $section) {
            $json_data = json_decode($section->contents);
            $hero_section_sub_sections[] = [
                'title' => $json_data->title,
                'icon' => $json_data->icon,
                'link' => $json_data->link
            ];
        }
        return response()->json([
            'hero_section' => [
                "title" => $data->where('name', 'hero_section_title')->first()->title,
                "meta_title" => $data->where('name', 'hero_section_title')->first()->meta_title,
                "description" => $data->where('name', 'hero_section_title')->first()->description,
                "meta_description" => $data->where('name', 'hero_section_title')->first()->meta_description,
                "banner" => $data->where('name', 'hero_section_title')->first()->image,
                "sub-sections" => $hero_section_sub_sections
            ],
        ]);
    }
    public function our_values(){
        $data = FrontendContent::all();
        $our_values = FrontendContent::where('name', 'like', 'our_values_section_%')->orderBy('order_of_appearance')->get();
        $our_value_sub_sections = [];
        foreach ($our_values as $section) {
            $json_data = json_decode($section->contents);
            $our_value_sub_sections[] = [
                'title' => $json_data->title,
                'description' => $json_data->description,
            ];
        }
        return response()->json([
            'our_values_section' => [
                "title" => $data->where('name', 'our_values_title')->first()->title,
                "meta_title" => $data->where('name', 'our_values_title')->first()->meta_title,
                "description" => $data->where('name', 'our_values_title')->first()->description,
                "meta_description" => $data->where('name', 'our_values_title')->first()->meta_description,
                "sub-sections" => $our_value_sub_sections
            ],
        ]);
    }
    public function about_us(){
        $data = FrontendContent::all();
        return response()->json([
            'about_us_section' => [
                "title" => $data->where('name', 'about_us_title')->first()->title,
                "meta_title" => $data->where('name', 'about_us_title')->first()->meta_title,
                "description" => $data->where('name', 'about_us_title')->first()->description,
                "meta_description" => $data->where('name', 'about_us_title')->first()->meta_description
            ],
        ]);
    }
    public function our_services(){
        $data = FrontendContent::all();
        $our_services = FrontendContent::where('name', 'like', 'our_services_service_%')->orderBy('order_of_appearance')->get();
        $our_services_sub_sections = [];
        foreach ($our_services as $section) {
            $json_data = json_decode($section->contents);
            $our_services_sub_sections[] = [
                'title' => $json_data->title,
                'icon' => $json_data->icon,
                'description' => $json_data->description,
            ];
        }
        return response()->json([
            'our_services_section' => [
                "title" => $data->where('name', 'our_services_title')->first()->title,
                "meta_title" => $data->where('name', 'our_services_title')->first()->meta_title,
                "description" => $data->where('name', 'our_services_title')->first()->description,
                "meta_description" => $data->where('name', 'our_services_title')->first()->meta_description,
                "sub-sections" => $our_services_sub_sections
            ],
        ]);
    }
    public function portfolio(){
        $data = FrontendContent::all();
        $portfolio = FrontendContent::where('name', 'like', 'portfolio_project_%')->orderBy('order_of_appearance')->get();
        $portfolio_sub_sections = [];
        foreach ($portfolio as $section) {
            $json_data = json_decode($section->contents);
            $portfolio_sub_sections[] = [
                'title' => $json_data->title,
                'link' => $json_data->link,
                'description' => $json_data->description,
            ];
        }
        return response()->json([
            'portfolio_section' => [
                "title" => $data->where('name', 'portfolio_title')->first()->title,
                "meta_title" => $data->where('name', 'portfolio_title')->first()->meta_title,
                "description" => $data->where('name', 'portfolio_title')->first()->description,
                "meta_description" => $data->where('name', 'portfolio_title')->first()->meta_description,
                "sub-sections" => $portfolio_sub_sections
            ],
        ]);
    }
    public function pricing(){
        $data = FrontendContent::all();
        $packages = Package::orderBy('order_of_appearance')->get();
        $package_plans = [];
        foreach ($packages as $package) {
            $json_data = json_decode($package->details);
            $package_plans[] = [
                'title' => $package->title,
                'subtitle' => $package->subtitle,
                'price' => $package->price,
                'details' => $json_data
            ];
        }
        return response()->json([
            'pricing_section' => [
                "title" => $data->where('name', 'pricing_title')->first()->title,
                "meta_title" => $data->where('name', 'pricing_title')->first()->meta_title,
                "description" => $data->where('name', 'pricing_title')->first()->description,
                "meta_description" => $data->where('name', 'pricing_title')->first()->meta_description,
                "plans" => $package_plans
            ],
        ]);
    }
    public function faq(){
        $data = FrontendContent::all();
        $faqs = FrontendContent::where('name', 'like', 'faq_faq_%')->orderBy('order_of_appearance')->get();
        $faq_sub_sections = [];
        foreach ($faqs as $section) {
            $json_data = json_decode($section->contents);
            $faq_sub_sections[] = [
                'title' => $json_data->title,
                'description' => $json_data->description,
            ];
        }
        return response()->json([
            'faq_section' => [
                "title" => $data->where('name', 'faq_title')->first()->title,
                "meta_title" => $data->where('name', 'faq_title')->first()->meta_title,
                "description" => $data->where('name', 'faq_title')->first()->description,
                "meta_description" => $data->where('name', 'faq_title')->first()->meta_description,
                "sub-sections" => $faq_sub_sections
            ],
        ]);
    }
    public function testimonials(){
        $data = FrontendContent::all();
        $testimonials = FrontendContent::where('name', 'like', 'testimonials_testimonial_%')->orderBy('order_of_appearance')->get();
        $testimonials_sub_sections = [];
        foreach ($testimonials as $section) {
            $json_data = json_decode($section->contents);
            $testimonials_sub_sections[] = [
                'name' => $json_data->name,
                'designation' => $json_data->designation,
                'rating' => intval($json_data->rating),
                'review' => $json_data->review,
            ];
        }
        return response()->json([
            'testimonials_section' => [
                "title" => $data->where('name', 'testimonials_title')->first()->title,
                "meta_title" => $data->where('name', 'testimonials_title')->first()->meta_title,
                "description" => $data->where('name', 'testimonials_title')->first()->description,
                "meta_description" => $data->where('name', 'testimonials_title')->first()->meta_description,
                "sub-sections" => $testimonials_sub_sections
            ],
        ]);
    }
}
