<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function employees()
    {
        $employees = User::where('user_type', '!=', 'admin')->where('user_type', '!=', 'basic_user')->get();

        return view('admin.landing_page.employee.employees', compact('employees'));
    }

    public function employee_create()
    {
        return view('admin.landing_page.employee.create');
    }

    public function employee_store(Request $request)
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
                'user_type' => $request->user_type,
                'password' => Hash::make($request->password),
            ]);
    
            $user->save();
    
            return redirect()->route('employees.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function employee_edit($id)
    {
        $employee = User::find($id);

        return view('admin.landing_page.employee.edit', compact('employee'));
    }

    public function employee_update(Request $request, $id)
    {
        try{
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email',
            ]);
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->user_type = $request->user_type;
            $user->save();
    
            return redirect()->route('employees.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function employee_destroy($id)
    {
        try{
            $user = User::find($id);
            $user->delete();
    
            return redirect()->route('employees.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => 'Something went wrong']);
        }
    }
}
