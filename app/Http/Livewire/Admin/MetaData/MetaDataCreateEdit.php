<?php

namespace App\Http\Livewire\Admin\MetaData;

use Livewire\Component;
use App\Models\Page;


class MetaDataCreateEdit extends Component
{
    public $page;
    public $name;
    public $title;
    public $meta_keywords;
    public $meta_description;
    public $description;
    public $edit=false;


    public function mount($page_id=null){
        if($page_id) {
            $this->page=Page::findOrFail($page_id);
            $this->edit=true;
            $this->fill($this->page);
        }
    }

    public function saveOrUpdate()
    {
         if($this->edit){
             $validatedData = $this->validate([
                'name' => 'required',
                'title' => 'required',
                'meta_keywords'=>'nullable',
                'meta_description'=>'nullable'
                ]);
         }
         else {
             $validatedData = $this->validate([
                'name' => 'required',
                'title' => 'required',
                'meta_keywords'=>'nullable',
                'meta_description'=>'nullable'
             ]);
              $this->page=new Page;
         }
        
        $this->page->fill($validatedData)->save();
        
         if($this->edit) 
            $this->dispatchBrowserEvent('toastr', ['type' => "success",'msg'=>"Meta Data successfully updated"]);
        else{
            $this->reset();
            $this->dispatchBrowserEvent('toastr', ['type' => "success",'msg'=>"Meta Data successfully added"]);
        }
         return redirect()->route('meta.data.list');
    }
    public function render()
    {
        return view('livewire.admin.meta-data.meta-data-create-edit')->layout('layouts.admin',['title'=>'Meta Data']);
    }
}
