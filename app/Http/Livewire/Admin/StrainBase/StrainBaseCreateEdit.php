<?php

namespace App\Http\Livewire\Admin\StrainBase;

use Livewire\Component;
use App\Models\StrainBase;
use Livewire\WithFileUploads;

class StrainBaseCreateEdit extends Component
{
    use WithFileUploads;
    
    public $strainBase;
    public $name;
    public $short_description;
    public $origin;
    public $effects_of_use;
    public $plant_description;
    public $recommended_timings;
    public $cbd_to_thc_ratio;
    public $popular_strains;
    public $image="";
    public $edit=false;


    public function mount($strain_base_id=null){
        if($strain_base_id) {
            $this->strainBase=StrainBase::findOrFail($strain_base_id);
            $this->edit=true;
            $this->fill($this->strainBase);
        }
    }

    public function saveOrUpdate()
    {
       
         if($this->edit){
             $validatedData = $this->validate([
                'name' => 'required',
                'short_description' => 'required',
                "origin"=>"nullable",
                "effects_of_use"=>"nullable",
                "plant_description"=>"nullable",
                "recommended_timings"=>"nullable",
                "cbd_to_thc_ratio"=>"nullable",
                "popular_strains"=>"nullable",
                // 'image' => 'image|max:1024', // 1MB Max
                ]);
         }
         else {
             $validatedData = $this->validate([
                'name' => 'required',
                'short_description' => 'required',
                "origin"=>"nullable",
                "effects_of_use"=>"nullable",
                "plant_description"=>"nullable",
                "recommended_timings"=>"nullable",
                "cbd_to_thc_ratio"=>"nullable",
                "popular_strains"=>"nullable",
                'image' => 'required|image|max:1024', // 1MB Max
             ]);
              $this->strainBase=new StrainBase;
         }
         if(!is_string($this->image)) {
            // $validatedData['image']=ImageHelper::saveImage($this->image,'upload');
            $name = md5($this->image . microtime()).'.'.$this->image->extension();
            $validatedData['image']=$name;
            $this->image->storeAs('uploads',$name, 'upload');
          }
        //  dd($this->image);
        //  if($this->image){
            //$this->image->storeAs('uploads', $name);
        // }
        $this->strainBase->fill($validatedData)->save();
        
         if($this->edit) 
            $this->dispatchBrowserEvent('toastr', ['type' => "success",'msg'=>"Strain Base successfully updated"]);
        else{
            $this->reset();
            $this->dispatchBrowserEvent('toastr', ['type' => "success",'msg'=>"StrainBase successfully added"]);
        }
         return redirect()->route('strain.base.list');
    }

    public function render()
    {
        return view('livewire.admin.strain-base.strain-base-create-edit')->layout('layouts.admin',['title'=>'Strain Base']);
    }
}
