<?php

namespace App\Utils;

use App\Models\Conference;
use Illuminate\Support\Facades\Session;

class ConferenceDatabase
{
    public static function addConference($conference): void
    {
        $conferences = Session::get('conferences', []);
        $conferences[] = $conference;
        Session::put('conferences', $conferences);
    }

    public static function getConferences()
    {
        return Session::get('conferences', []);
    }

    public static function getConferenceById($id)
    {
        $conferences = self::getConferences();

        foreach ($conferences as $conference) {
            if ($conference['id'] == $id) {
                return $conference;
            }
        }

        return null;
    }

    public static function updateConference($id, $conferenceData): void
    {
        $conferences = self::getConferences();

        foreach ($conferences as &$conference) {
            if ($conference['id'] == $id) {
                $conference = array_merge($conference, $conferenceData);
                break;
            }
        }

        session(['conferences' => $conferences]);
    }

    public static function deleteById($id): void
    {
        $conferences = self::getConferences();

        $conferences = array_filter($conferences, function ($conference) use ($id) {
            return $conference['id'] != $id;
        });

        session(['conferences' => $conferences]);
    }

    public static function isConferenceFinished($id)
    {
        $conference = self::getConferenceById($id);

        if ($conference && now() > $conference['end_date']) {
            return true;
        }

        return false;
    }

}
