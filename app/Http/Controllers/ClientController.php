<?php

namespace App\Http\Controllers;

use App\Utils\ConferenceDatabase;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function conferences()
    {
        $conferences = ConferenceDatabase::getConferences();
        return view('client', ['conferences' => $conferences]);
    }

    public function viewConference($id)
    {
        $conference = ConferenceDatabase::getConferenceById($id);

        if (!$conference) {
            return redirect()->route('client')->with('error', 'Conference not found');
        }

        return view('viewConference', ['conference' => $conference]);
    }

    public function registerConference($id)
    {
        $conference = ConferenceDatabase::getConferenceById($id);

        if (!$conference) {
            return redirect()->route('client')->with('error', 'Conference not found');
        }

        $isRegistered = $this->isConferenceRegistered($id);

        if ($isRegistered) {
            return redirect()->route('client')->with('error', 'You are already registered for this conference');
        }

        return redirect()->route('client')->with('success', 'Conference registration successful');
    }

    private function isConferenceRegistered($id)
    {
        $registeredConferences = Session::get('registered_conferences', []);
        return in_array($id, $registeredConferences);
    }

}
