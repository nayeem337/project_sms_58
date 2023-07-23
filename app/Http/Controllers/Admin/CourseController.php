<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    protected $course;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.courses.index', [
            'courses'    => Course::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.courses.create', [
            'categories'    => Category::where('status', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Course::createOrUpdateCourse($request);
        return back()->with('success', 'Course created successfully.');
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
    public function edit(string $id)
    {
        return view('back.courses.edit', [
            'course'    => Course::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Course::createOrUpdateCourse($request, $id);
        return redirect('/courses')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->course = Course::find($id);
        if (file_exists($this->course->image))
        {
            unlink($this->course->image);
        }
        $this->course->delete();
        return back()->with('success', 'Category deleted successfully.');
    }
}
