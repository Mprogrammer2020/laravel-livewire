<?php

namespace App\Http\Livewire\Admin\DesiredEffects;

use Livewire\Component;
use App\Models\DesiredEffect;

class DesiredEffectsCreateEdit extends Component
{
    public $desiredEffect;
    public $name;
    public $description;
    public $edit=false;


    public function mount($desired_effect_id=null){
        if($desired_effect_id) {
            $this->desiredEffect=DesiredEffect::findOrFail($desired_effect_id);
            $this->edit=true;
            $this->fill($this->desiredEffect);
        }
    }

    public function saveOrUpdate()
    {
       
         if($this->edit){
             $validatedData = $this->validate([
                'name' => 'required',
                'description' => 'nullable',
                ]);
         }
         else {
             $validatedData = $this->validate([
                'name' => 'required',
                'description' => 'nullable'
             ]);
              $this->desiredEffect=new DesiredEffect;
         }
        
        $this->desiredEffect->fill($validatedData)->save();
        
         if($this->edit) 
            $this->dispatchBrowserEvent('toastr', ['type' => "success",'msg'=>"Strain Base successfully updated"]);
        else{
            $this->reset();
            $this->dispatchBrowserEvent('toastr', ['type' => "success",'msg'=>"StrainBase successfully added"]);
        }
         return redirect()->route('desired.effects.list');
    }
    public function render()
    {
        return view('livewire.admin.desired-effects.desired-effects-create-edit')->layout('layouts.admin',['title'=>'Desire Effect']);
    }
}
