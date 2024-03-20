<?php

namespace App\Http\Livewire\Admin\StrainOptions;

use Livewire\Component;
use App\Models\StrainOption;
use App\Models\DesiredEffect;
use Livewire\WithFileUploads;



class StrainOptionsCreateEdit extends Component
{
    use WithFileUploads;

    public $strainOption;
    public $name;
    public $description;
    public $desired_effect_id;
    public $image = "";
    public $edit = false;


    public function mount($strain_option_id = null)
    {
        if ($strain_option_id) {
            $this->strainOption = StrainOption::findOrFail($strain_option_id);
            $this->edit = true;
            $this->fill($this->strainOption);
        }
    }

    public function saveOrUpdate()
    {

        if ($this->edit) {
            $validatedData = $this->validate([
                'name' => 'required',
                'desired_effect_id' => 'required',
                'description' => 'nullable',
            ]);
        } else {
            $validatedData = $this->validate([
                'name' => 'required',
                'description' => 'nullable',
                'desired_effect_id' => 'required',
                'image' => 'required|image|max:1024', // 1MB Max

            ]);
            $this->strainOption = new StrainOption;
        }
        if (!is_string($this->image)) {
            // $validatedData['image']=ImageHelper::saveImage($this->image,'upload');
            $name = md5($this->image . microtime()) . '.' . $this->image->extension();
            $validatedData['image'] = $name;
            $this->image->storeAs('uploads', $name, 'upload');
        }

        $this->strainOption->fill($validatedData)->save();

        if ($this->edit)
            $this->dispatchBrowserEvent('toastr', ['type' => "success", 'msg' => "Strain Base successfully updated"]);
        else {
            $this->reset();
            $this->dispatchBrowserEvent('toastr', ['type' => "success", 'msg' => "StrainBase successfully added"]);
        }
        return redirect()->route('education.course.list');
    }
    public function render()
    {
        return view(
            'livewire.admin.strain-options.strain-options-create-edit',
            [
                'desiredEffects' => DesiredEffect::get()
            ]
        )->layout('layouts.admin', ['title' => 'Strain Option']);
    }
}
