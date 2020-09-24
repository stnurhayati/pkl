<?php

namespace App\Http\Controllers\SNU;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SNU\Student;

class StudentController extends Controller
{

    public function index()
    {
        $student = Student::latest()->paginate(5);
    
        return view('SNU.Student.index',compact('student'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('SNU.Student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'class_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
            
        ]);
    
        Student::create($request->all());
     
        return redirect()->route('SNUStudent.index')
                        ->with('success','Product created successfully.');
    }

    public function show(Student $student)
    {
        return view('SNU.Student.show',compact('student'));
    } 

    public function edit(Student $Student)
    {
        return view('SNU.Student.edit',compact('student'));
    }
    
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'class_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
    
        $student->update($request->all());
    
        return redirect()->route('SNUStudent.index')
                        ->with('success','Product updated successfully');
    }
    
    public function destroy(Student $student)
    {
        $student->delete();
    
        return redirect()->route('SNUStudent.index')
                        ->with('success','Product deleted successfully');
    }
}