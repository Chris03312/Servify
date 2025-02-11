<?php

class DashboardController {
    private $dashboard;

    public function __construct(DashboardInterface $dashboard) {
        $this->dashboard = $dashboard;
    }

    public function index() {
        $volunteers = $this->dashboard->getVolunteersPerParish();
        view('admin_dashboard', [
            'volunteers' => $volunteers
        ]);
    }
}
