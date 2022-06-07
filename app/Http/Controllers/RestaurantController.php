<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Review;

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
    //Add Restaurant
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
    //Add review
    public function addReview(Request $request){
        $review = new Review;
        $review->users_id = $request->users_id;
        $review->restaurants_id = $request->restaurants_id;
        $review->description = $request->description;
        $review->rate = $request->rate;
        $review->status = 'on progress';
        $review->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }
    //GET all on progress reviews
    public function getOnProgressReview(){
        $review = Review::where("status", "LIKE", "on progress")->get();
        return response()->json([
            "status" => "Success",
            "results" => $review
        ], 200);
    }
}
