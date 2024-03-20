<?php

namespace App\Http\Livewire\Admin\Education;

use App\Models\Course;
use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class EducationVideoList extends Component
{
    use WithPagination;
    public $deleteConfirmId;

    protected $listeners = ['deleteConfirm' => 'deleteConfirm'];

    protected $paginationTheme = 'bootstrap';
    public function deleteConfirm()
    {
        // dd($this->deleteConfirm);
        Video::destroy($this->deleteConfirmId);
    }

    public function deleteAttempt($id)
    {
        $this->deleteConfirmId = $id;
    }
    public function render()
    {
        return view('livewire.admin.education.education-video-list', [
            'videos' => Video::orderBy('id', 'DESC')->paginate(8)
        ])->layout('layouts.admin', ['title' => 'Education']);
    }
}
