<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::all();
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:25|unique:students',
            'age' => 'required|integer|min:1',
            'address' => 'required|string|max:225',
        ]);

        Students::create($validate);

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    } catch (\Illuminate\Validation\ValidationException $e) {
        if ($request->expectsJson()) {
            return response()->json(['errors' => $e->errors()], 422);
        }
        return redirect()->back()->withErrors($e->errors());
    } catch (\Exception $e) {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'An error occurred while adding the student.'], 500);
        }
        return redirect()->back()->withErrors(['error' => 'An error occurred while adding the student.']);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students=Students::findorFail(($id));
        return view('students.show',compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students =Students::findorFail($id);
        return view('students.edit',compact('students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|string|max:25|unique:students,email,'.$id, 
            'age' => 'required|string|min:1',
            'address' => 'required|string|max:225',
        ]);

        $students =Students::findorFail($id);
        $students->update($validate);
        return redirect()->route('students.index')->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students =Students::findorFail($id);
        $students->delete();
        return redirect()->route('students.index')->with('success','Deleted successfully');
    }
}