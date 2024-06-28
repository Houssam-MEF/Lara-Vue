<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return Inertia::render('Homepage', [
            'subjects' => $subjects
        ]);
    }

    public function create()
    {
        return Inertia::render('Subjects/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        
        $user = $request->user();
        if ($user->name !== 'houss') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        $subject = new Subject();
        $subject->label = $request->label;
        $subject->description = $request->description;
        $subject->save();

        return back();
    }

    public function show($label)
    {
        $subject = Subject::where('label', $label)->firstOrFail();

        return Inertia::render('Subjects/Subject', [
            'subject' => $subject
        ]);
        // return Inertia::render('Subjects/Show', ['subject' => $subject]);
    }

    public function edit(Subject $subject)
    {
        return Inertia::render('Subjects/Edit', ['subject' => $subject]);
    }

    public function update(Request $request, Subject $subject)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $subject->update($validatedData);
        return redirect()->route('subjects.index');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index');
    }
}
