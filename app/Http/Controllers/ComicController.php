<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    protected $ruleValidation =  [
        'title' => 'required|max:80',
        'author' => 'required|max:60',
        'price' => 'required|numeric',
        'genre' => 'nullable',
        'description' => 'nullable',
        'photo' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::paginate(20);
        $data = [
            'comics' => $comics,
            'title' => 'Comics Home'
        ];
        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create', ['title'=> 'New Comic']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate($this->ruleValidation);
        $data = $request->all();
        $comic = new Comic();
        $comic->fill($data);
        $comic->save();
        $save = $comic->save();

        if (!$save) {
            dd('salvataggio non riuscito');
        }

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        $data = [
            'comic' => $comic,
            'title' => $comic->title
        ];
        return view('comics.show', $data);
        // dd($comic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', ['comic'=>$comic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $validateData = $request->validate($this->ruleValidation);
        $data = $request->all();
        $updated = $comic->update($data);
        if (!$updated) {
            dd('aggiornamento dati non riuscito');
        }
        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()
            ->route('comics.index')
            ->with('status', "Comic $comic->id deleted!");
    }
}
