<?php

require_once __DIR__ . '/../../models/Landingpage.php';


class LandingPageController
{

    // ABOUT US
    public static function Showlandingpage()
    {
        $volunteers = Landingpage::Volunteers();

        view('LandingPage/landingpage', [
            'volunteers' => $volunteers
        ]);
    }

    public static function ShowWhoWeAre()
    {
        $volunteers = Landingpage::Volunteers();

        view('LandingPage/whoarewe', [
            'volunteers' => $volunteers
        ]);
    }


    public static function ShowMissionVision()
    {
        $volunteers = Landingpage::Volunteers();

        view('LandingPage/mission-vision', [
            'volunteers' => $volunteers
        ]);
    }

    public static function ShowOrganizationProfile()
    {
        $volunteers = Landingpage::Volunteers();
        $coordinators = Landingpage::Coordinators();

        view('LandingPage/organization', [
            'volunteers' => $volunteers,
            'coordinators' => $coordinators
        ]);
    }

    // VOLUNTEERS

    // public static function ShowVolunteers()
    // {
    //     $allMissions = Landingpage::Volunteers(); // Get all missions for the navbar
    //     $volunteers = $allMissions; // Default to all

    //     // Get the selected mission from URL
    //     $selected_mission = $_GET['mission'] ?? '';

    //     // If a mission is selected, filter only that mission
    //     if (!empty($selected_mission)) {
    //         $volunteers = array_filter($allMissions, function ($volunteer) use ($selected_mission) {
    //             return $volunteer['MISSION_DESCRIPTION'] === $selected_mission;
    //         });
    //     }

    //     view('LandingPage/volunteers', [
    //         'volunteers' => $volunteers,
    //         'allMissions' => $allMissions // Pass all missions to the view for the navbar
    //     ]);
    // }

    // public static function ShowVolunteers()
    // {

    //     $volunteers = Landingpage::Volunteers();

    //     view('volunteers', [
    //         'volunteers' => $volunteers
    //     ]);

    // }

    public static function ShowVolunteers()
    {
        $volunteers = Landingpage::Volunteers(); 

        $selected_mission = $_GET['mission'] ?? '';

        if (!empty($selected_mission)) {
            $volunteers = array_filter($volunteers, function ($volunteer) use ($selected_mission) {
                return $volunteer['MISSION_DESCRIPTION'] === $selected_mission;
            });
        }

        view('LandingPage/volunteers', [
            'volunteers' => $volunteers
        ]);
    }
    
    // RESOURCES

    public static function ShowResources()
    {
        $volunteers = Landingpage::Volunteers();

        view('LandingPage/resources', [
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

        view('LandingPage/events', [
            'volunteers' => $volunteers
        ]);

    }

    

    // TYPES OF VOLUNTEER 

    public static function ShowPollwatchers()
    {

        $volunteers = Landingpage::Volunteers();

        view('landingpage/pollwatchers', [
            'volunteers' => $volunteers
        ]);

    }
    public static function ShowPSV()
    {
        $volunteers = Landingpage::Volunteers();

        view('landingpage/psv', [
            'volunteers' => $volunteers
        ]);

    }
    public static function ShowUPCE()
    {
        $volunteers = Landingpage::Volunteers();

        view('landingpage/upce', [
            'volunteers' => $volunteers
        ]);

    }
    public static function ShowVAD()
    {
        $volunteers = Landingpage::Volunteers();

        view('landingpage/vad', [
            'volunteers' => $volunteers
        ]);

    }
    public static function ShowEO()
    {
        $volunteers = Landingpage::Volunteers();

        view('landingpage/eo', [
            'volunteers' => $volunteers
        ]);

    }

    // ANNOUNCEMENTS
    public static function ShowAnnouncement1()
    {
        $volunteers = Landingpage::Volunteers();

        view('landingpage/announcement1', [
            'volunteers' => $volunteers
        ]);

    }

    public static function ShowAnnouncement2()
    {
        $volunteers = Landingpage::Volunteers();

        view('landingpage/announcement2', [
            'volunteers' => $volunteers
        ]);

    }

    public static function ShowAnnouncement3()
    {
        $volunteers = Landingpage::Volunteers();

        view('landingpage/announcement3', [
            'volunteers' => $volunteers
        ]);

    }

    public static function ShowAnnouncement4()
    {
        $volunteers = Landingpage::Volunteers();

        view('landingpage/announcement4', [
            'volunteers' => $volunteers
        ]);

    }

    public static function ShowAnnouncement5()
    {
        $volunteers = Landingpage::Volunteers();

        view('landingpage/announcement5', [
            'volunteers' => $volunteers
        ]);

    }


}