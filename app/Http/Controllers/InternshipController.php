<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use App\Internship;

class InternshipController extends Controller
{
    public function index()
    {
        $internships = Internship::all()->map(function ($internship) {
            return $this->getPassableInternship($internship);
        })->toArray();

        return Inertia::render('Index', [
            'internships' => $internships
        ]);
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
