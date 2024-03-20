<?php

namespace App\Http\Livewire\Admin\StrainOptions;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StrainOption;


class StrainOptionsList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $deleteConfirmId;
    protected $listeners = ['deleteConfirm' => 'deleteConfirm'];

    public function render()
    {
        return view('livewire.admin.strain-options.strain-options-list',[
            'strainOptions' => StrainOption::orderBy('id', 'DESC')->paginate(8)
            ])->layout('layouts.admin',['title'=>'Strain Option']);
    }
    public function deleteConfirm(){
        StrainOption::destroy($this->deleteConfirmId);
        
    }
    public function deleteAttempt($id){
        $this->deleteConfirmId=$id;
    }
}
