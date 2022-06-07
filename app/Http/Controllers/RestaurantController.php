<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    //Get all restaurant or single restaurant by id
    public function getAllRestaurants($id = null){
        if($id != null){
            $restos = Restaurant::find($id);
        }else{
            $restos = Restaurant::all();
        }
        
        return response()->json([
            "status" => "Success",
            "restos" => $restos
        ], 200);
    }
    public function addRestaurant(Request $request){
        $restaurant = new Restaurant;
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->profile_pic = $request->profile_pic;
        $restaurant->address = $request->address;
        $restaurant->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }

}
