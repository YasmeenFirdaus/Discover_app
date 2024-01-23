<?php

namespace App\Http\Controllers;

use App\Models\AddApi;
use App\Models\CategoryMaster;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class AddApiController extends Controller
{
    /**
     * Display the form to add API or Retrieve all API data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        try {
            // Your common functionality goes here

            // If it's an API request, retrieve and return all API data
            if ($request->header('Accept') && Str::contains($request->header('Accept'), 'json')) {
                $apiData = AddApi::all();
                return response()->json(['data' => $apiData], JsonResponse::HTTP_OK);
            }

            // If it's a web request, display the form with dynamic categories
            $category = DB::table('add_api')->distinct()->pluck('category')->toArray(); // Adjust to 'category'
            $api = AddApi::all();
            return view('admin.dashboard.add_api', compact('api', 'category'));
        } catch (\Exception $e) {
            // Handle exceptions if any
            return response()->json(['error' => $e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    /**
     * Add a new API with provided data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function Newapi(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'apiname' => 'required|string',
                'apiurl' => 'required|string',
                'category' => 'required|string', // Validate as a string
            ]);

            // Create an instance of the 'ApiData' model
            $apiData = new AddApi();

            // Assign values to model properties
            $apiData->api_name = $validatedData['apiname'];
            $apiData->api_url = $validatedData['apiurl'];
            $apiData->category = $validatedData['category'];
            $apiData->created_by = 'Admin';
            $apiData->updated_by = 'Admin';

            // Save the 'ApiData' model to the database
            $apiData->save();

            // Create an instance of the 'CategoryMaster' model
            // $category = new CategoryMaster(); // Adjust the model name

            // Assign the 'category' value to the 'category_name' field
            // $category->category_name = $validatedData['category'];

            // Save the 'CategoryMaster' model to the database
            // $category->save();

            // Return the appropriate response based on the request type
            if ($request->header('Accept') && Str::contains($request->header('Accept'), 'json')) {
                // This is an API request
                return response()->json(['message' => 'API data and category have been stored successfully.'], JsonResponse::HTTP_CREATED);
            } else {
                // This is a web request
                return redirect()->back()->with('success', 'API data and category have been stored successfully.');
            }
        } catch (ValidationException $e) {
            // Handle validation errors
            $errors = $e->validator->errors()->all();
            return response()->json(['error' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Exception $e) {
            // Handle other exceptions
            return response()->json(['error' => $e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // // ApiController.php
    // public function getFreshData()
    // {
    //     $freshData = Api::whereNotNull('response')
    //                     ->orderBy('created_at', 'desc')
    //                     ->get();

    //     return response()->json($freshData);
    // }
}


