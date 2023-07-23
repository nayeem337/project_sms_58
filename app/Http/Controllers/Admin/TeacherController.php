<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\fileExists;

class TeacherController extends Controller
{
    protected $user, $teacher;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.teachers.index', [
            'teachers'  => Teacher::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->user = User::createUser($request);
        $this->teacher = Teacher::createOrUpdateTeacher($request, $this->user->id);
        return back()->with('success', 'Teacher created successfully.');
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
        return view('back.teachers.edit', [
            'teacher'   => Teacher::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->teacher = Teacher::find($id);
        Teacher::createOrUpdateTeacher($request, $this->teacher->user_id, $id);
        return redirect('/teachers')->with('success', 'Teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->teacher = Teacher::find($id);
        $this->user = User::where('id', $this->teacher->user_id)->first();
        $this->user->delete();
        if (file_exists($this->teacher->image))
        {
            unlink($this->teacher->image);
        }
        $this->teacher->delete();
        return back()->with('success', 'Teacher deleted successfully.');
    }
}
