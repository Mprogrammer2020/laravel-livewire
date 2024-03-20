<?php

namespace App\Http\Livewire\Admin\DesiredEffects;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DesiredEffect;

class DesiredEffectsList extends Component
{
    use WithPagination;

    public $deleteConfirmId;
    protected $listeners = ['deleteConfirm' => 'deleteConfirm'];

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.admin.desired-effects.desired-effects-list',[
            'desiredEffects' => DesiredEffect::orderBy('id', 'DESC')->paginate(8)
            ])->layout('layouts.admin',['title'=>'Desire Effect']);
    }
    public function deleteConfirm(){
        DesiredEffect::destroy($this->deleteConfirmId);
        
    }
    public function deleteAttempt($id){
        $desiredEffect=DesiredEffect::find($id);
        if($desiredEffect->strainOptions()->exists())
            $this->dispatchBrowserEvent('exist-warning');
        else{
            $this->deleteConfirmId=$id;
            $this->dispatchBrowserEvent('modal-open');
        }
       
    }
}
