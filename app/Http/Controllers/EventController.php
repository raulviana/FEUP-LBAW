<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Event;
use App\EventCollaborators;
use App\User;
use App\Tag;
use App\Local;
use Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;



class EventController extends Controller
{

    public function list(){
        $events = Event::with('owner', 'local', 'tags', 'posts')->get();

        return view('pages.events', ['events' => $events]);
    }

    public function show($id)
    {
        $event = Event::find($id);

        return view('pages.event', ['event' => $event]);
    }

    public function create()
    {
        $this->authorize('create', Event::class);

        return view('pages.event_create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'local' => 'required',
            'start_date' => 'required | date',
            'end_date' => 'required | date | after:start_date',
            'upload-photo' => 'required'
        ]);

      
        
        $path = $request->file('upload-photo')->store('/public/event_photo');
        $filename = basename($path);

        DB::beginTransaction();

        try {
            $event = new Event;
            
            $event->title = $request->input('title');
            $event->details = $request->input('details');
            $event->start_date = $request->input('start_date');
            $event->end_date = $request->input('end_date');


            $event->photo = $filename;
            if($request->input('is_private') == 'off')
                $event->type = 'public';
            else
                $event->type = 'private';
                
            $event->owner_id = Auth::user()->id;

            $event->local_id = $this->addLocal($request['local']);

            $event->save();

            if($request['tag_theater']) $this->addTag('Theater', $event->id);
            if($request['tag_sculpture']) $this->addTag('Sculpture', $event->id);
            if($request['tag_dance']) $this->addTag('Dance', $event->id);
            if($request['tag_music']) $this->addTag('Music', $event->id);
            if($request['tag_paintings']) $this->addTag('Painting', $event->id);
            if($request['tag_comedy']) $this->addTag('Comedy', $event->id);
            if($request['tag_literature']) $this->addTag('Literature', $event->id);
            if($request['tag_others']) $this->addTag('Others', $event->id);

            if($request['url_facebook']) $this->addSocialMedia('Facebook', $request['url_facebook'] , $event->id);
            if($request['url_twitter']) $this->addSocialMedia('Twitter', $request['url_twitter'], $event->id);
            if($request['url_instagram']) $this->addSocialMedia('Instagram', $request['url_instagram'], $event->id);
            if($request['url_youtube']) $this->addSocialMedia('Youtube', $request['url_youtube'], $event->id);
            if($request['url_website']) $this->addSocialMedia('Website', $request['url_website'], $event->id);

            DB::commit();
            return redirect('/')->with('success', 'Event created with success!');

        } catch(QueryException $e){
            DB::rollBack();
            return redirect('/')->with('error', 'Error in submiting request to database');
        }
    }

    public function edit($id){
        $event = Event::find($id);

        $this->authorize('update', $event);

        return view('pages.event_create', ['event' => $event]);
    }

    public function update(Request $request){
        $event = Event::find($request['id']);
       

        if(!is_null($request->input('title'))){
            $event->title = $request->input('title');
        }
        
        if(!is_null($request->input('local'))){
            $event->local_id = $this->addLocal($request->input('local'));
    
        }
       
        if(!is_null($request->input('start_date'))){
            $event->start_date = $request->input('start_date');
    
        }

        if(!is_null($request->input('end_date'))){
            $event->start_date = $request->input('start_date');
    
        }

        if(!is_null($request->input('details'))){
            $event->details = $request->input('details');
    
        }


        if($request['tag_theater']) $this->addTag('Theater', $event->id);
        if($request['tag_sculpture']) $this->addTag('Sculpture', $event->id);
        if($request['tag_dance']) $this->addTag('Dance', $event->id);
        if($request['tag_music']) $this->addTag('Music', $event->id);
        if($request['tag_paintings']) $this->addTag('Painting', $event->id);
        if($request['tag_comedy']) $this->addTag('Comedy', $event->id);
        if($request['tag_literature']) $this->addTag('Literature', $event->id);
        if($request['tag_others']) $this->addTag('Others', $event->id);


        if($request['url_facebook']) $this->addSocialMedia('Facebook', $request['url_facebook'] , $event->id);
        if($request['url_twitter']) $this->addSocialMedia('Twitter', $request['url_twitter'], $event->id);
        if($request['url_instagram']) $this->addSocialMedia('Instagram', $request['url_instagram'], $event->id);
        if($request['url_youtube']) $this->addSocialMedia('Youtube', $request['url_youtube'], $event->id);
        if($request['url_website']) $this->addSocialMedia('Website', $request['url_website'], $event->id);


       
        $event->save();

        return redirect('/events/'.$event->id)->with('success', 'Your event is up to date!');    
    }

    public function delete(Request $request){
        $event = Event::find($request['id']);
       
        try{
            $event->is_active = false;
            $event->save();
            Log::info('Event ' . $event->title . ' with id:' . $event->id . ' deleted');
            $request->session()->flash('success', 'Event was removed');
            return response()->json($event, 200); 
        } catch(ModelNotFoundException $e){
            $request->session()->flash('error', 'Event couldnt be removed');

            Log::error('Could not delete event' . $event->title . ' with id:' . $event->id . ' - not found');
            return response()->json($event, 404);
        } 
    }

    public function restore(Request $request){
       $event = Event::find($request['id']);
       
        try{
            $event->is_active = true;
            $event->save();
            Log::info('Event ' . $event->title . ' with id:' . $event->id . ' restored');
            return response()->json($event, 200);
        }
        catch(ModelNotFoundException $e){
            Log::error('Could not restore event' . $event->title . ' with id:' . $event->id . ' - not found');
            return response()->json($event, 404);
        }
    }

    public function removeCollaborator(Request $request){
        $row = EventCollaborators::where('event_id', $request['event_id'])
                                ->where('user_id', $request['user_id'])
                                ->get();

        try{
            ($row[0])->delete();
            $request->session()->flash('success', 'Collaborator was removed');
            return response()->json($row[0]);
        } catch(ModelNotFoundException $e){
            Log::error('Unable to remove Collaborator from event with id:' . $request['event_id']);
            $request->session()->flash('error', 'Ups! Cant remove collaborator');
            return response()->json([], 404);
        }
    }

    public function addCollaborator(Request $request){
        $users = User::where('email', $request['query'])->get();

        if(count($users) == 1){
            $user = $users[0];

            $candidate = DB::table('collaborators_event')->where('event_id', '=', $request['event_id'])
                                                        ->where('user_id', '=', $user->id)
                                                        ->get();

            if(count($candidate) == 0){
                DB::table('collaborators_event')->updateOrInsert(
                    ['event_id' => $request['event_id'], 'user_id' => $user->id]
                );
    
                return response()->json($user, 200);
            }      
            else {
                Log::error('Unable to add collaborator to event with id:' . $request['event_id'] . ' - internal error (500)');
                return response()->json($user, 500);
            }

                     
        }
        Log::error('Unable to add collaborator to event with id:' . $request['event_id'] . ' - not found (404)');
        return response()->json([], 404);
    }

    public function addTag($tag_name, $event_id){
        $tag = Tag::where('name', 'like', $tag_name)->get();

        DB::table('event_tag')->updateOrInsert(
            ['event_id' => $event_id, 'tag_id' => $tag[0]->id]
        );
    }

    public function addLocal($local_name){
        $idLocal = DB::table('local')->insertGetId(
            ['name' => $local_name]
        );

        return $idLocal;
    }

    public function addSocialMedia($name, $url, $event_id){
        $idSocialMedia = DB::table('social_media')->insertGetId(
            ['name' => $name, 'url' => $url]
        );

        DB::table('event_social_media')->insert(
            ['event_id' => $event_id, 'social_media_id' => $idSocialMedia]
        );
    }

    public function search(Request $request){
        $request->validate([
            'query'=>'required|min:3',
        ]);
        $query = $request->input('query');

        $events = Event::where('title', 'like', "%$query%")
                            ->orWhere('details', 'like', "%$query%")
                            ->orWhere('start_date', 'like', "%$query%")
                            ->get();
        
                        

        return view('pages.search_results')->with('events', $events);
    }

    public function searchLocation(Request $request){
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        $local = Local::where('name', 'like', "%$query%")->get();

        $id = $local[0]['id'];

        $events = Event::where('local_id', 'like' , "%$id%")->get();
     
        
                    
        return view('pages.search_results')->with('events', $events);
    }
}
