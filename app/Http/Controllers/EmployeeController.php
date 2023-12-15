<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class EmployeeController extends Controller
{
    public function index()
    {   
        $employees=Employee::orderBy('id','asc')->paginate(5);
        return view('index',compact('employees'));
        //return view('index',['employees'=>'employees']); One Method

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'age' => 'required|numeric',
            'email' => 'required|unique:employees,Email|email',
            'jdate' => 'required|date',
            'phone' => 'required|numeric|unique:employees,Phone',
            'gender' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $imageName, 'public');
    
        $data = $request->except('_token');
        $data['image'] = $imageName; // Add image path to data array
    
        Employee::create($data);
    
        return redirect()->route('employee.index')->withMessage('Successfully Created');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        
        return view('show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        
        return view('edite',compact('employee'));

    }

    /**
     * Update the specified resource in storage.
     */
   // public function update(Request $request, string $id)
   public function update(Request $request, Employee $employee)
   {
       // Validate the incoming request data
    
       $request->validate([
           'Name' => 'required',
           'age' => 'required|numeric',
           'email' => 'required|unique:employees,Email,' . $employee->id . '|email',
           'jdate' => 'required|date',
           'phone' => 'required|numeric|unique:employees,Phone,' . $employee->id,
           'gender' => 'required',
           'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
   
       // Initialize $imageName
       $imageName = null;
   
       // Check if a new image is uploaded
       if ($request->hasFile('image')) {
           $image = $request->file('image');
           $imageName = time() . '.' . $image->getClientOriginalExtension();
   
           $image->storeAs('uploads', $imageName, 'public');
       }
   
       $updateData = $request->except('_token', '_method');
   
       // If a new image was uploaded, add it to the update data
       if ($imageName) {
           $updateData['image'] = $imageName;
       }
   
       $employee->update($updateData);
   
       // Redirect to the general index route for all employees
       return redirect()->route('employee.index')->withMessage('Successfully updated');
   }
   

   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
{
    try {
        $employee->delete();
        return redirect()->route('employee.index')->withSuccess('Employee deleted successfully');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Error deleting employee: ' . $e->getMessage()]);
    }
}

}
