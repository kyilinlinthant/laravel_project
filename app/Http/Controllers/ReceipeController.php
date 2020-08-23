<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\ReceipeCreatedEvent;
use App\Mail\ReceipeStored;
use App\Notifications\ReceipeStoredNotification;
use App\Receipe;
use App\User;
use App\test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReceipeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      
    public function index()
    {
        //Notification
        // $user=User::find(6);
        // $user->notify(new ReceipeStoredNotification());
        // echo "sent notification";
        // exit();

        $data = Receipe::where('author_id', auth()->id())->get();
        $data=Receipe::paginate(10);        

        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // dd(request()->all());
        $validatedData = request()->validate([
            'name' => 'required',
            'ingredients' => 'required',
            'category' => 'required',
        ]);

        $receipe = Receipe::create($validatedData + ['author_id' => auth()->id()]);

        //flash message and mailing service by event
        // event(new ReceipeCreatedEvent($receipe));

        return redirect("receipe")->with("message", 'Receipe has created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function show(Receipe $receipe)
    {
        // if($receipe->author_id != auth()->id()){
        //     abort(404);
        // }

        // dd($test);

        $this->authorize('view',$receipe);

        return view('show',compact('receipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipe $receipe)
    {
        $this->authorize('view',$receipe);

        $category=Category::all();
        return view('edit',compact('receipe','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function update(Receipe $receipe)
    {
        $this->authorize('view',$receipe);

        $validatedData = request()->validate([
            'name' => 'required',
            'ingredients' => 'required',
            'category' => 'required',
        ]);

        $receipe->update($validatedData);

        return redirect("receipe")->with("message", 'Receipe has updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipe $receipe)
    {
        $this->authorize('view',$receipe);
        
        $receipe->delete();

        return redirect("receipe")->with("message", 'Receipe has deleted successfully!');
    }

}

