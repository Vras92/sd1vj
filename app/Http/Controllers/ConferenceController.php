<?php

namespace App\Http\Controllers;

use App\Utils\ConferenceDatabase;
use Faker\Factory as FakerFactory;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function adminConference()
    {
        $conferences = session('conferences');

        if (!$conferences) {
            $faker = FakerFactory::create();

            $conferences = [];

            for ($i = 0; $i < 5; $i++) {
                $conference = [
                    'id' => $i,
                    'title' => $faker->words(3, true),
                    'description' => $faker->paragraph,
                    'place' => $faker->city,
                    'start_date' => $faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d H:i:s'),
                    'end_date' => $faker->dateTimeBetween('+1 month', '+2 months')->format('Y-m-d H:i:s'),
                ];

                $conferences[] = $conference;
            }

            session(['conferences' => $conferences]);
        }

        return view('adminConference', ['conferences' => $conferences]);
    }

    public function show($id)
    {
        $conference = ConferenceDatabase::getConferenceById($id);

        if ($conference) {
            return view('show', ['conference' => $conference]);
        } else {
            abort(404);
        }
    }

    public function deleteConference($id)
    {
        if (ConferenceDatabase::isConferenceFinished($id)) {
            return redirect()->route('adminConference')->with('error', 'Cannot delete a finished conference');
        }

        ConferenceDatabase::deleteById($id);

        return redirect()->route('adminConference')->with('success', 'Conference deleted successfully');
    }

    public function modifyConference($id)
    {
        $conference = ConferenceDatabase::getConferenceById($id);

        if ($conference) {
            return view('modifyConference', ['conference' => $conference]);
        } else {
            abort(404);
        }
    }

    public function updateConference(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'place' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        if (ConferenceDatabase::isConferenceFinished($id)) {
            return redirect()->route('adminConference')->with('error', 'Cannot modify a finished conference');
        }

        ConferenceDatabase::updateConference($id, $validatedData);

        return redirect()->route('adminConference')->with('success', 'Conference updated successfully');
    }

    public function create()
    {
        return view('createConference', ['conference' => ['id' => null]]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'place' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $conference = [
            'id' => $request->input('id') ?? uniqid(),
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'place' => $validatedData['place'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
        ];

        ConferenceDatabase::addConference($conference);

        return redirect()->route('adminConference')->with('success', 'Conference created successfully');
    }


}
