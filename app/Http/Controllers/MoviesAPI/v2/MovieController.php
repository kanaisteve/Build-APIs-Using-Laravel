<?php

namespace App\Http\Controllers\MoviesAPI\v2;

use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\MoviesAPI\v2\MoviesResource;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     *  Get all movies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Movie::all();
        return MoviesResource::collection(Movie::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a new movie
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        $movie = new Movie();

        $movie->title = $request->title;
        $movie->storyline = $request->storyline;
        $movie->language = $request->language;
        $movie->box_office = $request->box_office;
        $movie->release_date = $request->release_date;
        $movie->rating = $request->rating;
        $movie->runtime = $request->runtime;

        $movie->save();
        return response([
            "data" => $movie
        ], 201);
    }

    /**
     * Show a single movie by id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return Movie::find($movie->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieRequest $request, Movie $movie)
    {
        $movie->update($request->all());

        return response([
            "data" => $movie
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return response(['data' => 'movie deleted successfully']);
    }
}
