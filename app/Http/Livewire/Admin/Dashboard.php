<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\StrainBase;
use App\Models\DesiredEffect;
use App\Models\StrainOption;
use App\Models\Ticket;
use App\Models\User;

class Dashboard extends Component
{
    public $count;
    public $users, $tickets;

    public function mount()
    {
        $this->count['strainBaseCount'] = StrainBase::count();
        $this->count['desiredEffectCount'] = DesiredEffect::count();
        $this->count['strainOptionCount'] = StrainOption::count();
        $this->count['leads'] = User::role('CLIENT')->count();
        $this->users = User::role('USER')->latest()->take(5)->get();
        $this->tickets = Ticket::latest()->take(5)->get();
    }
    public function render()
    {
        return view('livewire.admin.dashboard')
            ->layout('layouts.admin', ['title' => 'Dashboard']);
    }
}
