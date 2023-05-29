<?php

namespace App\Http\Controllers\API\App\Admin;

use App\Admin\Helpers\ApiResponse;
use App\Http\ActionsControllers\ShiftActionsController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Rules\Shift\CreateShiftRequest;
use App\Http\Requests\Rules\Shift\UpdateShiftRequest;
use App\Objects\ErrorMessage;

class ShiftController extends Controller
{
    /**
     * Get all shift
     * @return
     */
    public function getShift(){
        $shift = (new ShiftActionsController())->getShift();
        return ApiResponse::successWithData([
            'shift' => $shift
        ]);
    }

    /**
     * create a new shift
     * @param CreateShiftRequest $request
     * @return
     */
    public function store(CreateShiftRequest $request){
        try {
            (new ShiftActionsController())->store($request);
            return ApiResponse::success();
        } catch (\Exception $exception) {
            (new ErrorMessage(ErrorMessage::exceptionToString($exception)))->notify();
            return ApiResponse::error($exception->getMessage());
        }
    }

    /**
     * update a shift
     * @param UpdateShiftRequest $request
     * @return
     */
    public function update(UpdateShiftRequest $request){
        try {
            (new ShiftActionsController())->update($request);
            return ApiResponse::success();
        } catch (\Exception $exception) {
            (new ErrorMessage(ErrorMessage::exceptionToString($exception)))->notify();
            return ApiResponse::error($exception->getMessage());
        }
    }

    /**
     * delete a shift
     * @param Request $request
     * @return
     */
    public function delete(Request $request){
        try {
            (new ShiftActionsController())->delete($request);
            return ApiResponse::success();
        } catch (\Exception $exception) {
            (new ErrorMessage(ErrorMessage::exceptionToString($exception)))->notify();
            return ApiResponse::error($exception->getMessage());
        }
    }

    /**
     * reactive a shift
     * @param Request $request
     * @return
     */
    public function restore(Request $request){
        try {
            (new ShiftActionsController())->restore($request);
            return ApiResponse::success();
        } catch (\Exception $exception) {
            (new ErrorMessage(ErrorMessage::exceptionToString($exception)))->notify();
            return ApiResponse::error($exception->getMessage());
        }
    }
}
