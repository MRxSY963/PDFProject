<?php

namespace App\Http\Controllers;

use App\Models\course_student;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $courses = Course::all();
        $course_students = course_student::all();
        return view('courses.course_receipt_one', compact('students', 'courses', 'course_students'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('courses.create_receipt', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the form input
         // Validate the form input
    $validatedData = $request->validate([
    'student_name' => 'required',
    'guardian_name' => 'required',
    'installment_number' => 'required|integer',
    ]);

    // Create a new student instance
    $student = new Student;
    $student->student_name = $request->student_name;
    $student->guardian_name = $request->guardian_name;
    $student->installment_number = $request->installment_number;
    $student->save();

    // Loop through the selected courses
    foreach ($request->input('courses') as $courseId) {
        $courseStudent = new course_student;
        $courseStudent->course_id = $courseId;
        $courseStudent->student_id = $student->id;
        $courseStudent->save();
    }



        // Redirect to the desired page or show a success message
        return redirect()->route('Courses.index')->with('success', 'Student created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        
        $course_students = course_student::where('student_id', $student->id)->get();
    
        $studentId = $id;
        $courses = Course::whereHas('students', function ($query) use ($studentId) {
            $query->where('student_id', $studentId);
        })->get();
    
        return view('courses.show_receipt', compact('student', 'courses', 'course_students'));
    }
    
    
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
