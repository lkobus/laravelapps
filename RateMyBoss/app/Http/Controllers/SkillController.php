<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\User;

class SkillController extends Controller
{    
    public function find(){
        return Skill::all();
    }

    public function paginator(){
        return Skill::paginate(10);
    }

    public function usuarios(){
        return User::all();
    }

    public function count(){
        return Skill::count();
    }

    public function destroy($id){
        return Skill::destroy($id);
    }

    public function store(Request $request){        
        
        $result = Skill::where('description', $request->input(["description"]))->get();
        if($result->isEmpty()){
            $skill = new Skill;
            $skill->description = $request->input(["description"]);
            $skill->save();
            return $skill;
        } else {
            return response()->json([
                'error' => true,
                'message' => 'skill  already exist in database'
            ], 409);
        }
        
        
    }
}
