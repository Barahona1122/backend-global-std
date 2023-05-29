<?php

namespace App\Models;

use App\Objects\ValuesObject\MovieValues;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Movie extends Model
{
    use HasFactory;

    protected $fillable  = [
        'name','status','posted_date'
    ];

    protected $hidden = ['updated_at', 'created_at'];
 
    public function updateFromRequest(Request $request){
        $data = $request->only(['name','posted_date','status']);
        $this->update($data);
        return $this;
    }

    public static function createFromRequest(Request $request){
        $movie = new Movie();
        $movie->name = $request->get("name");
        $movie->posted_date = $request->get("posted_date");
        $movie->status = MovieValues::STATUS_ACTIVE;
        $movie->save();
        return $movie;
    }
}
