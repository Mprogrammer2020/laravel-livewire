<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;


class EducationController extends Controller
{
    public function index()
    {
        return view('user.education');
    }
    public function courseVideo(Course $course)
    {
        return view('user.education-course-video', compact('course'));
    }

    public function allCourses()
    {
        return response()->json([
            'message' => '', 'status' => true, 'data' => Course::latest()->with('videos')->paginate(5)
        ]);
    }
    public function getVideosByCourse(Course $course)
    {
        return response()->json([
            'message' => 'Success', 'status' => true, 'data' => $course->videos()->paginate(1)
        ]);
    }
    public function markCompleteVideo(Request $request)
    {
        auth()->user()->videos()->updateExistingPivot($request->video_id, ['is_active' => 0, 'is_complete' => 1]);
        return response()->json([
            'message' => 'Success', 'status' => true, 'data' => auth()->user()->videos
        ]);
    }
    public function markActiveVideo(Request $request)
    {
        if (!auth()->user()->videos->contains($request->video_id)) {
            auth()->user()->videos()->syncWithoutDetaching([$request->video_id => ['is_active' => 1]]);
        }
        return response()->json([
            'message' => 'Success', 'status' => true, 'data' => auth()->user()->videos
        ]);
    }
}
