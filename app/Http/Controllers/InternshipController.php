<?php

namespace App\Http\Controllers;

use App\Comment;
use App\States\Internship\InternshipState;
use App\States\Internship\NotAppliedYetInternshipState;
use http\Client\Request;
use Illuminate\Validation\Rule;
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

    public function states()
    {
        $classes = Internship::getAllStateClasses();

        $parsedClassNames = [];
        foreach($classes as $class) {
            $className = InternshipState::get_title($class);
            if($className != "") {
                $parsedClassNames[] = $className;
            }
        }

        return json_encode($parsedClassNames);
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

    public function update(\Illuminate\Http\Request $request, $id)
    {
        $validated = $request->validate([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'state' => Rule::in(json_decode($this->states()))
        ]);

        $classes = Internship::getAllStateClasses();

        foreach($classes as $class) {
            $userFriendlyTitle = InternshipState::get_title($class);
            if($userFriendlyTitle == $validated['state']) {
                $validated['state_class'] = str_replace(".php","", $class);
                Comment::create([
                    'text' => "You have updated the internship to the " . $userFriendlyTitle . " state!",
                    'internship_id' => $id
                ]);
                continue;
            }
        }
        $internship = Internship::find($id)->fill($validated);


        $internship->save();
        return $this->getPassableInternship($internship);
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
            'state',
            'comments'
        );
        $properties['url'] = Url::route('internship.show', ['internship' => $internship]);
        return $properties;
    }
}
