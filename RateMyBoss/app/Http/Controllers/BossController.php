<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boss;
use App\Source;
use App\JobExperience;
use App\NPS;

class BossController extends Controller
{
    //
    

    public function detail($id){
        $bosses = Boss::where('id', $id)->get();
        $result = array();
        for($i = 0; $i < $bosses->count();$i++){
            $count = NPS::where('id_boss', $bosses[$i]->id)->get()->count();
            $average = 0;            
            $result[$i] = array(
                "id" => $bosses[$i]->id,
                "name" => $bosses[$i]->name,
                "count" => $count,
                "average" => $average,                
                "picture" => '/imgs/misc/boss-icon.png'
            );                    
        }        
        return response()->json($result);
    }

    public function autocomplete($search){
        $bosses = Boss::where('name', 'LIKE', $search.'%')->get();
        $result = array();
        for($i = 0; $i < $bosses->count();$i++){
            $count = NPS::where('id_boss', $bosses[$i]->id)->get()->count();
            $average = 0;            
            $result[$i] = array(
                "id" => $bosses[$i]->id,
                "name" => $bosses[$i]->name,
                "count" => $count,
                "average" => $average
            );                    
        }        
        return response()->json($result);
    }

    public function store(Request $request){
        //to store a boss we need?
        //the name of the boss...
        //the source its if its user the logged one
        //create a job experience for him optional? yes...        

        $boss = Boss::where('name', $request->input(['name']))->get();            
            if(!$boss->isEmpty()){
                return response()->json([
                    'error' => true,
                    'message' => 'Boss already exist in database'
                ], 409);
            } else {
                $sources = Source::where('origin_id', auth()->guard('api')->user()->id)->get();
                if($sources->isEmpty()){
                    $source = new Source;
                    $source->value = 'Manual';
                    $source->origin_id = auth()->guard('api')->user()->id;
                    $source->type = true;                                
                    $source->save();
                } else {
                    $source = $sources->first();
                }
                            
                $b = new Boss;
                $b->name = $request->input(['name']);
                $b->visible = true;
                $b->source_id = $source->id;
                $b->save();

                if($request->input(['positionIncoming'])){
                    
                    $position = strtoupper($request->input(['position']));
                    $enterprise = strtoupper($request->input(['enterprise']));                    
                    $jobs = JobExperience::where('name', $position)
                    ->where('enterprise', $enterprise)->get();            
                    if($jobs->isEmpty()){
                        $job = new JobExperience;
                        $job->name = $position;
                        $job->enterprise = $enterprise;                                            
                        $job->save();
                    }
                    
                }

                return $b;
            }

    }

}
