<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = DB::table('student')
        ->join('class', function ($join) {
            $join->on('class.id', '=', 'student.class_id');
        })
        ->select(
            'student.id',
            'student.address',
            'student.dob',
            'class.name as className'
        )
        ->get();
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes = DB::table('class')->get();
        return view('student.create', ['classes'=>$classes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::table('student')->insert([
            'address' => $request->address,
            'dob' => $request->dob,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'class_id' => $request->class,
        ]);
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $student = DB::table('student')
        ->join('class', function($join) {
            $join->on('class.id', '=', 'student.class_id');
        })
        ->select(
            'student.id',
            'student.address',
            'student.dob',
            'student.first_name',
            'student.last_name',
            'class.name as class_name'
        )
        ->where('student.id', '=', $id)
        ->first();
        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $student = DB::table('student')
        ->where('id', '=', $id)
        ->first();

        $student->dob = Carbon::parse($student->dob)->format('Y-m-d');

        $classes = DB::table('class')->get();

        return view('student.edit', ['student' => $student, 'classes' => $classes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::table('student')
            ->where('student.id', '=', $id)
            ->update(
            [
                'address' => $request->address,
                'dob' => $request->dob,
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'class_id' => $request->class
            ]
        );
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('student')
        ->delete($id);
        return redirect()->route('student.index');
    }
}
