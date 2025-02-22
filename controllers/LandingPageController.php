<?php

require_once __DIR__ . '/../models/landingpage.php';


class LandingPageController
{

    // ABOUT US
    public static function Showlandingpage()
    {
        $volunteers = Landingpage::Volunteers();


        view('landingpage', [
            'volunteers' => $volunteers
        ]);
    }

    public static function ShowWhoWeAre()
    {
        $volunteers = Landingpage::Volunteers();

        view('whoarewe', [
            'volunteers' => $volunteers
        ]);
    }

    public static function ShowMissionVision()
    {
        $volunteers = Landingpage::Volunteers();

        view('mission-vision', [
            'volunteers' => $volunteers
        ]);
    }

    public static function ShowOrganizationProfile()
    {
        $volunteers = Landingpage::Volunteers();

        view('organization', [
            'volunteers' => $volunteers
        ]);
    }

    // VOLUNTEERS

    public static function ShowVolunteers()
    {

        $volunteers = Landingpage::Volunteers();

        view('volunteers', [
            'volunteers' => $volunteers
        ]);

    }

    // RESOURCES

    public static function ShowResources()
    {
        $volunteers = Landingpage::Volunteers();

        view('resources', [
            'volunteers' => $volunteers
        ]);

    }
    public static function ShowVolunteersGuide()
    {


        view('');

    }
    public static function ShowElectionGuidelines()
    {

        view('');

    }

    // EVENTS

    public static function ShowEvents()
    {

        $volunteers = Landingpage::Volunteers();

        view('events', [
            'volunteers' => $volunteers
        ]);

    }

}