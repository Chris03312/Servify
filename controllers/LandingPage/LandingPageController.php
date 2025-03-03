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

    // public static function ShowAnnouncements()
    // {
    //     $volunteers = Landingpage::Volunteers();
    //     $announcements = Landingpage::Announcements();

    //     view('LandingPage/announcements', [
    //         'volunteers' => $volunteers,
    //         'announcements' => $announcements
    //     ]);
    // }

    public static function ShowAnnouncement()
    {
        $announcementTitle = $_GET['announcements'] ?? null;

        if (!$announcementTitle) {
            die("Invalid request: No announcement selected.");
        }

        $announcements = Landingpage::Announcements($announcementTitle);

        if (!$announcements) {
            die("Error: No data found for this announcement.");
        }

        view('landingpage/announcements', [
            'announcements' => $announcements
        ]);
    }


    public static function ShowEvents()
    {
        $events = Landingpage::Announcements();
    
        view('landingpage/events', [
            'events' => $events
        ]);
    }

    // VOLUNTEERS


    // public static function ShowVolunteers()
    // {

    //     $volunteers = Landingpage::Volunteers();

    //     view('volunteers', [
    //         'volunteers' => $volunteers
    //     ]);

    // }

        // public static function ShowVolunteers()
    // {
    //     $allMissions = Landingpage::Volunteers(); 
    //     $volunteers = $allMissions;

    //     $selected_mission = $_GET['mission'] ?? '';

    //     if (!empty($selected_mission)) {
    //         $volunteers = array_filter($allMissions, function ($volunteer) use ($selected_mission) {
    //             return $volunteer['MISSION_DESCRIPTION'] === $selected_mission;
    //         });
    //     }

    //     view('LandingPage/volunteers', [
    //         'volunteers' => $volunteers,
    //         'allMissions' => $allMissions 
    //     ]);
    // }

    public static function ShowVolunteers()
    {
        $allMissions = Landingpage::Volunteers(); 
        $volunteers = $allMissions; 

        $selected_mission = $_GET['mission'] ?? '';

        if (!empty($selected_mission)) {
            $volunteers = array_filter($allMissions, function ($volunteer) use ($selected_mission) {
                return $volunteer['MISSION_DESCRIPTION'] === $selected_mission;
            });
        }

        view('LandingPage/volunteers', [
            'volunteers' => $volunteers,
            'allMissions' => $allMissions 
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

    

    // TYPES OF VOLUNTEER 

    public static function ShowPollwatchers()
    {

        $volunteers = Landingpage::Volunteers();

        view('landingpage/pollwatchers', [
            'volunteers' => $volunteers
        ]);
    }
    
    // ANNOUNCEMENTS

    // public static function ShowAnnouncement()
    // {
    //     $announcements = Landingpage::Volunteers();

    //     view('LandingPage/announcements', [
    //         'announcements' => $announcements
    //     ]);
    // }

    // public static function ShowEvents()
    // {
    //     $events = Landingpage::Announcements();

    //     view('LandingPage/events', [
    //         'events' => $events
    //     ]);
    // }

    // public static function ShowAnnouncement()
    // {
    //     if (!isset($_GET['event'])) {
    //         view('LandingPage/announcement', ['announcement' => null]);
    //         return;
    //     }

    //     $eventTitle = urldecode($_GET['event']);
    //     $announcement = Landingpage::getAnnouncementByTitle($eventTitle);

    //     view('LandingPage/announcements', [
    //         'announcement' => $announcement
    //     ]);
    // }

    // public static function ShowAnnouncement()
    // {
    //     $announcementTitle = $_GET['announcements'] ?? null;

    //     if (!$announcementTitle) {
    //         die("Invalid request: No announcement selected.");
    //     }

    //     $announcements = Landingpage::Announcements($announcementTitle); // Fetch a single announcement

    //     view('landingpage/announcements', [
    //         'announcements' => $announcements
    //     ]);
    // }






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


}