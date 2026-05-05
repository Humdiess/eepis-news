<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class DashboardLayout extends Component
{
    public string $role;
    public string $pageTitle;
    public string $title;
    public string $userName;

    public function __construct(
        string $role = 'admin',
        string $pageTitle = 'Dashboard',
        string $title = 'Dashboard',
        string $userName = 'Ahmad Fauzi',
    ) {
        $this->role = $role;
        $this->pageTitle = $pageTitle;
        $this->title = $title;
        $this->userName = $userName;
    }

    public function render(): View
    {
        return view('layouts.dashboard');
    }
}
