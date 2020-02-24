<?php

namespace App\Http\Controllers;

use App\States\Internship\NotAppliedYetInternshipState;
use http\Client\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use App\Internship;

class InternshipController extends Controller
{

    public function create()
    {
        return Inertia::render('Add');
    }


    public function index()
    {
        $internships = Internship::all()->map(function ($internship) {
            return $this->getPassableInternship($internship);
        })->toArray();

        return Inertia::render('Index', [
            'internships' => $internships
        ]);
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $validated['state_class'] = NotAppliedYetInternshipState::class;

        $internship = Internship::create($validated);
        $internship->save();

        return Redirect::route('internship.show', ['internship' => $internship]);
    }

    public function show(Internship $internship)
    {
        return Inertia::render('Show', [
            'internship' => $this->getPassableInternship($internship)
        ]);
    }

    private function getPassableInternship(Internship $internship)
    {
        $properties = $internship->only(
            'id',
            'title',
            'description',
            'state'
        );
        $properties['url'] = Url::route('internship.show', ['internship' => $internship]);
        return $properties;
    }
}
