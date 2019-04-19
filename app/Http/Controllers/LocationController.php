<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Location;
use App\Book;
use Illuminate\Http\Request; 
use Illuminate\Validation\Rule; 


class LocationController extends Controller
{
	
    // Show locations on locations views
    public function show ()
    {
        $locations = Location::where('id','!=','0')->get();
        return view('location.show',compact('locations'));
    }

  public function update(Request $request)
    {  
        // Add Rules 
        $rules = [
        'name' => 'required|unique:locations|min:4',    
        ];
        // Error Messages
        $messages = [
        'name.required' => 'Location Name is required!',
        'name.unique' => 'Location Already Exists!',
        'name.min' => 'Location Name should be at least 4 characters!',
        ];
        // Validate Inputs
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
        return response($validator->errors(), 401);
        }
        // Update Book Database and give a json response to show ajax notification

            if ($request->ajax()) {
            $location = Location::find($request->id)->update($request->all());
            return response()->json($location);
            }
    }


    // Location Add Action Using Ajax Request
    public function store(Request $request)
    {
        // Add Rules 
        $rules = [
        'name' => 'required|unique:locations|min:4',    
        ];
        // Error Messages
        $messages = [
        'name.required' => 'Location Name is required!',
        'name.unique' => 'Location Already Exists!',
        'name.min' => 'Location Name should be at least 4 characters!',
        ];
        // Validate Inputs
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
        return response($validator->errors(), 401);
        }
        else {
        $location = new Location;
        $location->name = $request->name;
        $location->save();
        return response()->json($location);
        }
    }


    // Location Delete Action Using Ajax Request
    public function destroy(Request $request)
    {  
         Location::find($request->id)->delete();           
         Book::where('book_location','=',$request->id)->update(array(
    'book_location' =>  '9' ) );           
    }

}
