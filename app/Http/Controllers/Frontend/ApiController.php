<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Package;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\FrontendContent;

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
        if($data->where('name', 'hero_section_title')->first()){
            return response()->json([
                'hero_section' => [
                    "title" => $data->where('name', 'hero_section_title')->first()->title,
                    "meta_title" => $data->where('name', 'hero_section_title')->first()->meta_title,
                    "description" => $data->where('name', 'hero_section_title')->first()->description,
                    "meta_description" => $data->where('name', 'hero_section_title')->first()->meta_description,
                    "banner" => $data->where('name', 'hero_section_title')->first()->image,
                    "sub-sections" => $hero_section_sub_sections
                ],
                "status" => 200,
                "message" => "This is the hero section data",
            ]);
        }else{  
            return response()->json([
                "status" => 403,
                "message" => "No data found",
                'hero_section' => ''
            ]);
        }
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
                'image' => $section->image
            ];
        }
        if($data->where('name', 'our_values_title')->first()){
            return response()->json([
                'our_values_section' => [
                    "title" => $data->where('name', 'our_values_title')->first()->title,
                    "meta_title" => $data->where('name', 'our_values_title')->first()->meta_title,
                    "description" => $data->where('name', 'our_values_title')->first()->description,
                    "meta_description" => $data->where('name', 'our_values_title')->first()->meta_description,
                    "sub-sections" => $our_value_sub_sections
                ],
                "status" => 200,
                "message" => "This is the our values section data",
            ]);
        }else{
            return response()->json([
                "status" => 403,
                "message" => "No data found",
                'our_values_section' => ''
            ]);
        }
    }
    public function about_us(){
        $data = FrontendContent::all();
        if($data->where('name', 'about_us_title')->first()){
            return response()->json([
                'about_us_section' => [
                    "title" => $data->where('name', 'about_us_title')->first()->title,
                    "meta_title" => $data->where('name', 'about_us_title')->first()->meta_title,
                    "description" => $data->where('name', 'about_us_title')->first()->description,
                    "meta_description" => $data->where('name', 'about_us_title')->first()->meta_description
                ],
                "status" => 200,
                "message" => "This is the about us section data",
            ]);
        }else{
            return response()->json([
                "status" => 403,
                "message" => "No data found",
                'about_us_section' => ''
            ]);
        }
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
                'image' => $section->image
            ];
        }
        if($data->where('name', 'our_services_title')->first()){
            return response()->json([
                'our_services_section' => [
                    "title" => $data->where('name', 'our_services_title')->first()->title,
                    "meta_title" => $data->where('name', 'our_services_title')->first()->meta_title,
                    "description" => $data->where('name', 'our_services_title')->first()->description,
                    "meta_description" => $data->where('name', 'our_services_title')->first()->meta_description,
                    "sub-sections" => $our_services_sub_sections
                ],
                "status" => 200,
                "message" => "This is the our services section data",
            ]);
        }else{
            return response()->json([
                "status" => 403,
                "message" => "No data found",
                'our_services_section' => ''
            ]);
        }
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
                'image' => $section->image,
                'type' => $json_data->type,
            ];
        }
        if($data->where('name', 'portfolio_title')->first()){
            return response()->json([
                'portfolio_section' => [
                    "title" => $data->where('name', 'portfolio_title')->first()->title,
                    "meta_title" => $data->where('name', 'portfolio_title')->first()->meta_title,
                    "description" => $data->where('name', 'portfolio_title')->first()->description,
                    "meta_description" => $data->where('name', 'portfolio_title')->first()->meta_description,
                    "sub-sections" => $portfolio_sub_sections
                ],
                "status" => 200,
                "message" => "This is the portfolio section data",
            ]);
        }else{
            return response()->json([
                "status" => 403,
                "message" => "No data found",
                'portfolio_section' => ''
            ]);
        }
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
        if($data->where('name', 'pricing_title')->first()){
            return response()->json([
                'pricing_section' => [
                    "title" => $data->where('name', 'pricing_title')->first()->title,
                    "meta_title" => $data->where('name', 'pricing_title')->first()->meta_title,
                    "description" => $data->where('name', 'pricing_title')->first()->description,
                    "meta_description" => $data->where('name', 'pricing_title')->first()->meta_description,
                    "plans" => $package_plans
                ],
                "status" => 200,
                "message" => "This is the pricing section data",
            ]);
        }else{
            return response()->json([
                "status" => 403,
                "message" => "No data found",
                'pricing_section' => ''
            ]);
        }
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
        if($data->where('name', 'faq_title')->first()){
            return response()->json([
                'faq_section' => [
                    "title" => $data->where('name', 'faq_title')->first()->title,
                    "meta_title" => $data->where('name', 'faq_title')->first()->meta_title,
                    "description" => $data->where('name', 'faq_title')->first()->description,
                    "meta_description" => $data->where('name', 'faq_title')->first()->meta_description,
                    "sub-sections" => $faq_sub_sections
                ],
                "status" => 200,
                "message" => "This is the faq section data",
            ]);
        }else{
            return response()->json([
                "status" => 403,
                "message" => "No data found",
                'faq_section' => ''
            ]);
        }
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
        if($data->where('name', 'testimonials_title')->first()){
            return response()->json([
                'testimonials_section' => [
                    "title" => $data->where('name', 'testimonials_title')->first()->title,
                    "meta_title" => $data->where('name', 'testimonials_title')->first()->meta_title,
                    "description" => $data->where('name', 'testimonials_title')->first()->description,
                    "meta_description" => $data->where('name', 'testimonials_title')->first()->meta_description,
                    "sub-sections" => $testimonials_sub_sections
                ],
                "status" => 200,
                "message" => "This is the testimonials section data",
            ]);
        }else{
            return response()->json([
                "status" => 403,
                "message" => "No data found",
                'testimonials_section' => ''
            ]);
        }
    }

    public function register(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8',
            ]);
    
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'user_type' => 'basic_user',
                'password' => Hash::make($request->password),
            ]);
    
            $user->save();
    
            return response()->json([
                "status" => 200,
                "message" => "User created successfully",
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                "status" => 403,
                "message" => "Something went wrong",
            ]);
        }
    }

    public function login(Request $request)
    {
        // after confirm login data create sanctum token and return it
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication was successful
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                "status" => 200,
                "message" => "User logged in successfully",
                "token" => $token
            ]);
        } else {
            // Authentication failed
            return response()->json([
                "status" => 403,
                "message" => "Invalid credentials",
            ]);
        }
    }

    public function logout(Request $request)
    {
        try{
            $user = Auth::user()->email;
            $user_details = User::where('email', $user)->first();
            $user_details->tokens()->delete();
            return response()->json([
                "status" => 200,
                "message" => "User logged out successfully",
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                "status" => 403,
                "message" => "Something went wrong",
            ]);
        }
    }

    public function reset_password(Request $request)
    {
        try{
            $user_mail = Auth::user()->email;
            $request->validate([
                'new_password' => 'required|string|min:8',
            ]);
            $user = User::where('email', $user_mail)->first();
            // check old password match or not
            if(Hash::check($request->old_password, $user->password)){
                $user->password = Hash::make($request->new_password);
                $user->save();
                return response()->json([
                    "status" => 200,
                    "message" => "Password changed successfully",
                ]);
            }
            else{
                return response()->json([
                    "status" => 403,
                    "message" => "Old password doesn't match",
                ]);
            }
        }
        catch(\Exception $e){
            return response()->json([
                "status" => 403,
                "message" => "Something went wrong",
            ]);
        }
    }

    public function project(){
        $data = FrontendContent::all();
        $project = FrontendContent::where('name', 'like', 'project_project_%')->orderBy('order_of_appearance')->get();
        $project_sub_sections = [];
        foreach ($project as $section) {
            $json_data = json_decode($section->contents);
            $project_sub_sections[] = [
                'title' => $json_data->title,
                'link' => $json_data->link,
                'description' => $json_data->description,
                'image' => $section->image,
                'type' => $json_data->type,
            ];
        }
        if($data->where('name', 'project_title')->first()){
            return response()->json([
                'project_section' => [
                    "title" => $data->where('name', 'project_title')->first()->title,
                    "meta_title" => $data->where('name', 'project_title')->first()->meta_title,
                    "description" => $data->where('name', 'project_title')->first()->description,
                    "meta_description" => $data->where('name', 'project_title')->first()->meta_description,
                    "sub-sections" => $project_sub_sections
                ],
                "status" => 200,
                "message" => "This is the project section data",
            ]);
        }else{
            return response()->json([
                "status" => 403,
                "message" => "No data found",
                'project_section' => ''
            ]);
        }
    }
}
