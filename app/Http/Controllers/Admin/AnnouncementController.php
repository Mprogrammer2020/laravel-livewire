<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Exception;

class AnnouncementController extends Controller {

    function index() {
        $data = Announcement::where('status', 'ACTIVE')->get();
        return view('admin.announcement', ['data' => $data])->layout('layouts.admin', ['title' => 'Announcements']);
    }

    /**
     * store the announcements
     * @param Request $request
     * @return type
     */
    function store(Request $request) {
        $validator = $this->validate(request(), [
            'text.*' => 'required'
        ]);
        try {
            $announcementArray = [];
            foreach ($request->text as $text) {
                $announcementArray[] = ['description' => $text];
            }
            if (count($announcementArray) > 0) {
                Announcement::where('id', '>', '0')->delete();
                Announcement::insert($announcementArray);
                return response()->json(['status' => true, 'message' => 'Successful', 'data' => $announcementArray], 200);
            }
            return response()->json(['status' => false, 'message' => ['Server Error'], 'data' => []], 422);
        } catch (Exception $ex) {
            return response()->json(['status' => false, 'message' => ['Server Error'], 'data' => []], 422);
        }
    }

}
