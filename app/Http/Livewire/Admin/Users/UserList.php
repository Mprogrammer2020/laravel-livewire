<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use App\Http\Livewire\Admin\Traits\WithSorting;

use App\Exports\LeadsExport;


class UserList extends Component
{
    use WithPagination;
    use WithSorting;
    public $deleteConfirmId;
    public $search;
    protected $paginationTheme = 'bootstrap';
    public $role;

    protected $listeners = ['deleteConfirm' => 'deleteConfirm'];

    public function mount($role)
    {
        $this->role = $role;
    }
    public function exportToExcel()
    {
        return (new LeadsExport)->download('leads_' . date('d-m-Y_h:i_A') . '.xlsx');
    }

    public function deleteConfirm()
    {
        User::destroy($this->deleteConfirmId);
    }
    public function deleteAttempt($id)
    {
        $this->deleteConfirmId = $id;
    }
    public function getSalesByUser(User $user)
    {
        $salesCount = 0;
        foreach ($user->referrals as $key => $user) {
            $salesCount += $user->plants->sum('pivot.quantity');
        }
        return $salesCount;
    }
    public function render()
    {
        // dd($this->role);
        return view('livewire.admin.users.user-list', [
            'users' => User::Role($this->role)
                ->where('name', 'like', '%' . $this->search . '%')
                // ->orWhere('email', 'like', '%' . $this->search . '%')
                // ->orWhere('phone', 'like', '%' . $this->search . '%')
                // ->orWhere('business_name', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortBy, $this->sortDirection)->paginate(8)
        ])
            ->layout('layouts.admin', ['title' => 'Leads']);
    }
}
