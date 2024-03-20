<?php

namespace App\Http\Livewire\Admin\SupportTicket;

use App\Http\Livewire\Admin\Traits\WithSorting;
use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class SupportTicketList extends Component
{
    use WithPagination;
    use WithSorting;
    public $deleteConfirmId;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['deleteConfirm' => 'deleteConfirm'];

    public function deleteAttempt($id)
    {
        $this->deleteConfirmId = $id;
    }
    public function deleteConfirm()
    {
        Ticket::destroy($this->deleteConfirmId);
    }
    public function takeAction(Ticket $ticket, $status)
    {
        // dd($status);
        $ticket->update(['status' => $status]);
    }
    public function render()
    {
        return view('livewire.admin.support-ticket.support-ticket-list', [
            'tickets' => Ticket::where('subject', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortBy, $this->sortDirection)->paginate(5)
        ])
            ->layout('layouts.admin', ['title' => 'Support ticket']);
    }
}
