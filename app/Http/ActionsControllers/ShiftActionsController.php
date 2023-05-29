<?php

namespace App\Http\ActionsControllers;

use App\Http\Resources\ShiftResource;
use App\Models\Shift;
use App\Objects\ValuesObject\ShiftValues;
use Illuminate\Http\Request;
class ShiftActionsController
{
    public function getShift(){
        $shift = ShiftResource::collection(Shift::all());
        return $shift;
    }

    public function store(Request $request){
        return Shift::createFromRequest($request);
    }

    public function update(Request $request){
        $shift = Shift::find($request->get("id"));
        return $shift->updateFromRequest($request);
    }

    public function delete(Request $request){
        $shift = Shift::where("id",$request->get("id"))
            ->update(["status" => ShiftValues::STATUS_DELETED]);
        return $shift;
    }

    public function restore(Request $request){
        $shift = Shift::where("id",$request->get("id"))
            ->update(["status" => ShiftValues::STATUS_ACTIVE]);
        return $shift;
    }

}
