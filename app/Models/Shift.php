<?php

namespace App\Models;

use App\Objects\ValuesObject\ShiftValues;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Shift extends Model
{
    use HasFactory;

    protected $table = "shift";
    protected $fillable  = [
        'name','status'
    ];

    protected $hidden = ['updated_at', 'created_at'];


    public static function createFromRequest(Request $request){
        $movie = new Shift();
        $movie->name = $request->get("name");
        $movie->status = ShiftValues::STATUS_ACTIVE;
        $movie->save();
        
        return $movie;
    }

    public function updateFromRequest(Request $request){
        $data = $request->only(['name','status']);
        $this->update($data);
        return $this;
    }
}
