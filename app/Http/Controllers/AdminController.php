<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Element;

class AdminController extends Controller
{
    /**a
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where("stock", ">", 0)->get();

        return view('Admin ', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = [
            "name" => $request->name,
            "dateStart" => $request->dateStart,
            "timeStart" => $request->timeStart,
            "dateEnd" => $request->dateEnd,
            "timeEnd" => $request->timeEnd
        ];
        // dd($request);

        Event::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $calendar)
    {

        $events = Event::all()->map(function (Event $event) {
            $start = $event->dateStart . " " . $event->timeStart;
            $end = $event->dateEnd . " " . $event->timeEnd;
            return [
                "start" => $start,
                "end" => $end,
                "title" => $event->name,
                "color" => "#45647",
            ];
        });

        return response()->json([
            "events" => $events
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */





    public function edit(Admin $admin)
    {
        //
    }

    public function buy(Request $request, Event $event)
    {
        // $user = Auth::user(); // Get the authenticated user


        // if ($user->event->where('event_id', $event->id)->exists()) {
        //     return back()->with('error', 'You have already bought this event.');
        // }

        // // Attach the event to the user
        // $user->event->attach($event->id);

        // return back()->with('success', 'Event purchased successfully!');



        if ($event->stock > 0) {
            $event->decrement("stock");
            return redirect('success', 'Event purchased successfully!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        request()->validate([
            "name" => "required",
            "dateStart" => "required",
            "timeStart" => "required",
            "dateEnd"=> "required",
            "timeEnd" => "required",
        ]);
        // dd($request);

        // $auth = auth()->user();
        // dd($auth);
        $event->update([
            // "user_id" => $auth->id,
            "name" => $request->name,
            "dateStart" => $request->dateStart,
            "timeStart" => $request->timeStart,
            "dateEnd"=> $request->dateEnd,
            "timeEnd" => $request->timeEnd,
        ]);
        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return back();
    }
}
