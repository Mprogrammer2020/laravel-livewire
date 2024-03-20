<?php

namespace App\Http\Livewire\Admin\StrainBase;
use Livewire\WithPagination;
use App\Models\StrainBase;

use Livewire\Component;

class StrainBaseList extends Component
{
    use WithPagination;
    public $deleteConfirmId;

    protected $listeners = ['deleteConfirm' => 'deleteConfirm'];

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.admin.strain-base.strain-base-list',[
            'strainBases' => StrainBase::orderBy('id', 'DESC')->paginate(8)
            ])->layout('layouts.admin',['title'=>'Strain Base']);
    }
    public function deleteConfirm(){
        // dd($this->deleteConfirm);
        StrainBase::destroy($this->deleteConfirmId);
        
    }
    
    public function deleteAttempt($id){
        $this->deleteConfirmId=$id;
    }
}
