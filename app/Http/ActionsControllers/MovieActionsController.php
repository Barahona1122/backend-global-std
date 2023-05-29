<?php

namespace App\Http\ActionsControllers;
use Illuminate\Http\Request;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use App\Http\Requests\UpdateMovieRequest;
use App\Objects\ValuesObject\MovieValues;

class MovieActionsController
{
    public function getMovies(){
        $movie =  MovieResource::collection(Movie::all());
        return $movie;
    }

    public function store(Request $request){
        return Movie::createFromRequest($request);
    }

    public function update(Request $request){
        $movie = Movie::find($request->get("id"));
        return $movie->updateFromRequest($request);
    }

    public function delete(Request $request){
        $movie = Movie::where("id",$request->get("id"))
            ->update(["status" => MovieValues::STATUS_DELETED]);
        return $movie;
    }

    public function restore(Request $request){
        $movie = Movie::where("id",$request->get("id"))
            ->update(["status" => MovieValues::STATUS_ACTIVE]);
        return $movie;
    }
}
