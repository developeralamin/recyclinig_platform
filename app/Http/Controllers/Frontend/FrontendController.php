<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\RecyclingEvent;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\RecyclingParticipant;
use App\Models\RecyclingParticipantItem;

class FrontendController extends Controller
{
    public function how(){
        return view('frontend.how.index');
    }
    public function category()
    {
        $categories = Category::all();
        return view('frontend.category.index',compact('categories'));
    }

    //recycling Event
    public function recycleEvent($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $events =  RecyclingEvent::where('category_id',$category->id)->get();

        return view('frontend.category.event',compact('events'));
    }

    public function show($id)
    {
        $event =  RecyclingEvent::where('id',$id)->first();

        return view('frontend.category.event_details',compact('event'));
    }

    public function destroy($id)
    {
        $event = RecyclingEvent::findOrFail($id);

        // Check if a event and user already exists
        $participent = RecyclingParticipant::where('user_id', auth()->id())
                                        ->where('event_id', $event->id)
                                        ->first();
        if ($participent) {
            $participent->increment('count');
        } else {
            $participent = RecyclingParticipant::create([
                'user_id' => auth()->id(),
                'event_id' => $event->id,
                'count' => 1, 
            ]);
        }

        RecyclingParticipantItem::create([
            'user_id' => auth()->id(),
            'participant_id' => $participent->id,
        ]);

        return back();
    }

    public function about()
    {
        return view('frontend.about.index');
    }
    public function scroreboard()
    {
        return view('frontend.scoreboard.index');
    }
    // public function recyclingCenter()
    // {
    //     return view('frontend.scoreboard.index');
    // }
}
