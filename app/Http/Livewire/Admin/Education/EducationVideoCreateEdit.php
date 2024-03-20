<?php

namespace App\Http\Livewire\Admin\Education;

use Livewire\Component;
use App\Models\Course;
use App\Models\Video;
use Livewire\WithFileUploads;

class EducationVideoCreateEdit extends Component
{
    use WithFileUploads;

    public $video;
    public $name;
    public $description;
    public $video_link = "";
    public $video_thumbnail_image = "";
    public $course_id;
    public $edit = false;


    public function mount($education_video_id = null)
    {
        if ($education_video_id) {
            $this->video = Video::findOrFail($education_video_id);
            $this->edit = true;
            $this->fill($this->video);
        }
    }

    public function saveOrUpdate()
    {

        if ($this->edit) {
            $validatedData = $this->validate([
                'name' => 'required',
                'video_link' => 'required',
                'course_id' => 'required',
                'description' => 'nullable',
            ]);
        } else {
            $validatedData = $this->validate([
                'name' => 'required',
                'description' => 'nullable',
                'course_id' => 'required',
                'video_link' => 'required',
                'video_thumbnail_image' => 'required|image|max:5000',

            ], ['course_id.required' => "Please select a lesson."]);
            $this->video = new Video();
        }
        if (!is_string($this->video_thumbnail_image)) {
            // $validatedData['video_thumbnail_image']=ImageHelper::saveImage($this->video_thumbnail_image,'upload');
            $name = md5($this->video_thumbnail_image . microtime() . rand()) . '.' . $this->video_thumbnail_image->extension();
            $validatedData['video_thumbnail_image'] = $name;
            $this->video_thumbnail_image->storeAs('uploads', $name, 'upload');
        }

        $this->video->fill($validatedData)->save();

        if ($this->edit)
            $this->dispatchBrowserEvent('toastr', ['type' => "success", 'msg' => "Strain Base successfully updated"]);
        else {
            $this->reset();
            $this->dispatchBrowserEvent('toastr', ['type' => "success", 'msg' => "StrainBase successfully added"]);
        }
        return redirect()->route('education.video.list');
    }
    public function render()
    {
        return view('livewire.admin.education.education-video-create-edit', [
            'courses' => Course::get()
        ])
            ->layout('layouts.admin', ['title' => 'Education']);
    }
}
