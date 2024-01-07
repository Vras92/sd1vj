<?php

namespace App\Http\Controllers;

use App\Utils\ConferenceDatabase;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function conferences(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $conferences = ConferenceDatabase::getConferences();
        return view('client', ['conferences' => $conferences]);
    }

    public function viewConference($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $conference = ConferenceDatabase::getConferenceById($id);

        if (!$conference) {
            return redirect()->route('client')->with('error', 'Conference not found');
        }

        return view('viewConference', ['conference' => $conference]);
    }

    public function registerConference($id): \Illuminate\Http\RedirectResponse
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

    private function isConferenceRegistered($id): bool
    {
        $registeredConferences = Session::get('registered_conferences', []);
        return in_array($id, $registeredConferences);
    }

}
