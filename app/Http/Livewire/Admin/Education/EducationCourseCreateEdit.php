<?php

namespace App\Http\Livewire\Admin\Education;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithFileUploads;

class EducationCourseCreateEdit extends Component
{
    use WithFileUploads;

    public $course;
    public $name;
    public $description;
    public $image = "";
    public $edit = false;
    public $isDisabled = true;


    public function mount($education_course_id = null)
    {
        if ($education_course_id) {
            $this->course = Course::findOrFail($education_course_id);
            $this->edit = true;
            $this->fill($this->course);
        }
    }

    public function saveOrUpdate()
    {

        if ($this->edit) {
            $validatedData = $this->validate([
                'name' => 'required',
                'description' => 'nullable',
            ]);
        } else {
            $validatedData = $this->validate([
                'name' => 'required',
                'description' => 'nullable',
                'image' => 'required|image|max:5000', // 1MB Max

            ]);
            $this->course = new Course;
        }
        if (!is_string($this->image)) {
            // $validatedData['image']=ImageHelper::saveImage($this->image,'upload');
            $name = md5($this->image . microtime() . rand()) . '.' . $this->image->extension();
            $validatedData['image'] = $name;
            $this->image->storeAs('uploads', $name, 'upload');
        }

        $this->course->fill($validatedData)->save();

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
        if($this->name != "" && $this->image != ""){
            $this->isDisabled = false;
        }else{
            $this->isDisabled = true;
        }
        return view('livewire.admin.education.education-course-create-edit')
            ->layout('layouts.admin', ['title' => 'Education']);
    }
}
