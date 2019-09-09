<?php

namespace App\Http\Controllers;

use App\Models\SClass;
use App\Models\Course;
use App\Models\User;
use App\Models\AcadTerm;
use App\Models\Setting;

use Illuminate\Http\Request;

class SClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degree = Setting::where('name', 'LIKE', 'Degree')->get()[0]->value;
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;

        $acad_terms = AcadTerm::all();

        if( request()->has('select_acad_term') ) {
            $selected_acad_term = request('select_acad_term');
        }
        else {
            $selected_acad_term = $cur_acad_term;
        }

        $classes = SClass::where('acad_term_id', 'LIKE', $selected_acad_term)->paginate(15);

        return view('classes.index')
                ->with('classes', $classes)
                ->with('degree', $degree)
                ->with('acad_terms', $acad_terms)
                ->with('cur_acad_term', $cur_acad_term)
                ->with('selected_acad_term', $selected_acad_term);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;
        $acad_terms = AcadTerm::where('acad_term_id', '>=', $cur_acad_term)->get();
        $instructors = User::whereHas("roles", function($q){ $q->where("name", "faculty"); })->get();
        $courses = Course::all();

        return view('classes.create')
                ->with('courses', $courses)
                ->with('acad_terms', $acad_terms)
                ->with('instructors', $instructors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
