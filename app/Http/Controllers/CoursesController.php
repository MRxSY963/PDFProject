<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all(); // Retrieve all courses from the database
        
        return view('courses.courses')->with('Courses', $courses);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('courses.courses', compact('CoursesAll'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'Course_names' => 'required',
            'Course_prices' => 'required|numeric',
            'Course_categorys' => 'required',
            'Course_descriptions' => 'required',
        ]);

        // Create a new course
        $course = new Course();
        $course->course_name = $request->input('Course_names');
        $course->price = $request->input('Course_prices');
        $course->course_type = $request->input('Course_categorys');
        $course->description_of_course = $request->input('Course_descriptions');
        $course->save();

        // Redirect to the courses index page
        return redirect()->route('CoursesAll.index')->with('success', 'Course created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::where('id', $id)->first();

        $fillable = [
            'Course_names', 'Course_prices', 'description_of_course', 'Course_categorys', 'Course_descriptions'
        ];
    
        return view('courses.edit')->with('course', $course);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $course = Course::findOrFail($id);

        $course->course_name = $request->input('Course_names');
        $course->price = $request->input('Course_prices');
        $course->course_type = $request->input('Course_categorys');
        $course->description_of_course = $request->input('Course_descriptions');
        $course->save();

        // Redirect to the courses index page
        return redirect()->route('CoursesAll.index')->with('success', 'Course Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
