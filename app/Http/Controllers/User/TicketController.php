<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\IssueCategory;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TicketController extends Controller
{
  public function index()
  {
    $tickets = Ticket::whereUserId(auth()->id())->latest()->paginate(5);
    return response()->json(['status' => true, 'data' => $tickets, 'issueCategories' => IssueCategory::all(), 'message' => 'Success']);
  }


  public function postsave(Request $request)
  {
    $validator  =   Validator::make($request->all(), [
      "subject"  =>  "required",
      "description"  =>  "required",
      "issue_category_id" =>  "required"
    ], ['issue_category_id.required' => 'Issue category is required']);
    if ($validator->fails())
      return response()->json([
        'message' => $validator->errors(), 'status' => false
      ]);

    $ticket = new Ticket();
    $ticket->fill($request->all());
    $ticket->save();
    return response()->json([
      'message' => 'Tickethas been created successfully!!', 'status' => true
    ]);
  }
}
