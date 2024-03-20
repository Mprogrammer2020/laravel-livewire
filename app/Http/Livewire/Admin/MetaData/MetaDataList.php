<?php

namespace App\Http\Livewire\Admin\MetaData;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Page;

class MetaDataList extends Component
{
    use WithPagination;

    public $deleteConfirmId;
    protected $listeners = ['deleteConfirm' => 'deleteConfirm'];

    protected $paginationTheme = 'bootstrap';
    // public function deleteConfirm(){
    //     Page::destroy($this->deleteConfirmId);
        
    // }
    
    // public function deleteAttempt($id){
    //     $this->deleteConfirmId=$id;
    // }
    public function render()
    {
        return view('livewire.admin.meta-data.meta-data-list',[
            'pages' => Page::orderBy('id', 'DESC')->paginate(8)
            ])->layout('layouts.admin',['title'=>'Meta Data']);
    }
}
