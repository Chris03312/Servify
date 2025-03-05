<?php

require_once __DIR__ . '/../../models/Landingpage.php';


class LandingPageController
{

    public static function Showlandingpage()
    {
        $volunteers = Landingpage::Volunteers();
        $coordinators = Landingpage::Coordinators(); 

        view('LandingPage/landingpage', [
            'volunteers' => $volunteers,
            'coordinators'=> $coordinators
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


    // public static function ShowOrganizationProfile()
    // {
    //     $volunteers = Landingpage::Volunteers();
    //     $coordinators = Landingpage::Coordinators();

    //     view('LandingPage/organization', [
    //         'volunteers' => $volunteers,
    //         'coordinators' => $coordinators
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
        $resources = Landingpage::Resources();

        view('LandingPage/resources', [
            'resources' => $resources
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

    //     $announcements = Landingpage::Announcements($announcementTitle); 

    //     view('landingpage/announcements', [
    //         'announcements' => $announcements
    //     ]);
    // }



}