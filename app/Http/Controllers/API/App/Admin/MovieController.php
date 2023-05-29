<?php

namespace App\Http\Controllers\API\App\Admin;

use App\Admin\Helpers\ApiResponse;
use App\Http\ActionsControllers\MovieActionsController;
use App\Objects\ErrorMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Rules\Movies\CreateMovieRequest;
use App\Http\Requests\Rules\Movies\UpdateMovieRequest;

class MovieController extends Controller
{
    /**
     * Get all movies
     * @return
     */
    public function getMovies(){
        $movies = (new MovieActionsController())->getMovies();
        return ApiResponse::successWithData([
            'movies' => $movies
        ]);
    }

    /**
     * create a new movie
     * @param CreateMovieRequest $request
     * @return
     */
    public function store(CreateMovieRequest $request){
        try {
            (new MovieActionsController())->store($request);
            return ApiResponse::success();
        } catch (\Exception $exception) {
            (new ErrorMessage(ErrorMessage::exceptionToString($exception)))->notify();
            return ApiResponse::error($exception->getMessage());
        }
    }

    /**
     * update a movie
     * @param UpdateMovieRequest $request
     * @return
     */
    public function update(UpdateMovieRequest $request){
        try {
            (new MovieActionsController())->update($request);
            return ApiResponse::success();
        } catch (\Exception $exception) {
            (new ErrorMessage(ErrorMessage::exceptionToString($exception)))->notify();
            return ApiResponse::error($exception->getMessage());
        }
    }

    /**
     * delete a movie
     * @param Request $request
     * @return
     */
    public function delete(Request $request){
        try {
            (new MovieActionsController())->delete($request);
            return ApiResponse::success();
        } catch (\Exception $exception) {
            (new ErrorMessage(ErrorMessage::exceptionToString($exception)))->notify();
            return ApiResponse::error($exception->getMessage());
        }
    }

    /**
     * reactive a movie
     * @param Request $request
     * @return
     */
    public function restore(Request $request){
        try {
            (new MovieActionsController())->restore($request);
            return ApiResponse::success();
        } catch (\Exception $exception) {
            (new ErrorMessage(ErrorMessage::exceptionToString($exception)))->notify();
            return ApiResponse::error($exception->getMessage());
        }
    }
}
