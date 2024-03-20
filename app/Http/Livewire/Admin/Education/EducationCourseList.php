<?php

namespace App\Http\Livewire\Admin\Education;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;


class EducationCourseList extends Component
{
    use WithPagination;
    public $deleteConfirmId;

    protected $listeners = ['deleteConfirm' => 'deleteConfirm'];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.education.education-course-list', [
            'courses' => Course::orderBy('id', 'DESC')->paginate(8)
        ])->layout('layouts.admin', ['title' => 'Education']);
    }

    public function deleteConfirm()
    {
        // dd($this->deleteConfirm);
        Course::destroy($this->deleteConfirmId);
    }

    public function deleteAttempt($id)
    {
        $this->deleteConfirmId = $id;
    }
}
