<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        // var_dump(User::find(1));

        // $candidates = Candidate::all();
        $candidates = DB::select('select * from candidates');

        // dd($candidates);
        return view('candidate.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



        return view('candidate.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'resume' => 'required|mimes:pdf'
        ]);

        $resume = $request->file('resume');
        $name = $request->name;


        $fileExtension = $resume->getClientOriginalExtension();
        if ($resume) {
            $name = $name  . '.' . $fileExtension;
            $request->file('resume')->storeAs('resume', $name, 'public');
        }

        $candidate = new Candidate();
        $candidate->name = $request->name;
        $candidate->email = $request->email;
        $candidate->birthday = $request->birthday;
        $candidate->resume = $name;
        $candidate->save();

        return redirect()->route('candidate');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $collec = Candidate::find($id);
        return view('candidate.partials.show', compact('collec'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $collec = Candidate::find($id);
        return view('candidate.partials.edit', compact('collec'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $candidate =  Candidate::find($id);

        // if ($request->file) {
        //     $resume = $request->file('resume');
        //     $name = $request->name;
        //     $fileExtension = $resume->getClientOriginalExtension();
        //     if ($resume) {
        //         $name = $name  . '.' . $fileExtension;
        //         $request->file('resume')->storeAs('resume', $name, 'public');
        //     }
        // }

        // dd($candidate);
        $candidate->name = $request->name;
        $candidate->email = $request->email;
        $candidate->birthday = $request->birthday;
        $candidate->resume = $candidate->resume;
        $candidate->update();

        return redirect()->route('candidate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        Candidate::destroy($id);
        return back();
    }
}
