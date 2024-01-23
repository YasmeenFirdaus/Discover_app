<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;
use App\Models\Api; // Import the 'apis' model
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function Index(Request $request)
    {
        // Your common functionality goes here
        // ...

        // If it's a web request, display the web view
        if ($request->header('Accept') && Str::contains($request->header('Accept'), 'html')) {
            return view('admin.login.index');
        }

        // If it's an API request, retrieve and return all API data
        if ($request->header('Accept') && Str::contains($request->header('Accept'), 'json')) {
            // Retrieve all API data from the 'apis' model
            $apiData = apis::all();

            // Return the API data in JSON format
            return response()->json(['data' => $apiData], JsonResponse::HTTP_OK);
        }

        // If the request doesn't match 'html' or 'json', you can handle it accordingly
        return response()->json(['message' => 'Invalid request type.'], JsonResponse::HTTP_BAD_REQUEST);
    }

    public function Login(Request $request)
    {
        // Your common functionality goes here
        // ...

        $uname = $request->uname;
        $pass = $request->password;
        $school_code = $request->scode;

        $login_details = DB::table('users')->where('email', $uname)->first();

        if (!$login_details) {
            return back()->with('fail', 'Invalid Details');
        } else {
            if (Hash::check($request->password, $login_details->password)) {
                $request->session()->put('LoggedUser', $login_details->email);
                $request->session()->put('add', "admin@gmail.com");
                return redirect()->route('admin.dashboard')->with('message', 'Login Successfully');
            } else {
                return back()->with('fail', 'Invalid Details');
            }
        }
    }

    public function Dashboard(Request $request)
    {
        // Your common functionality goes here
        // ...

        // If it's a web request, display the web view
        if ($request->header('Accept') && Str::contains($request->header('Accept'), 'html')) {
            // Your existing dashboard logic remains unchanged
            return view('admin.dashboard.index');
        }

        // If it's an API request, retrieve and return all API data
        if ($request->header('Accept') && Str::contains($request->header('Accept'), 'json')) {
            // Retrieve all API data from the 'apis' model
            $apiData = apis::all();

            // Return the API data in JSON format
            return response()->json(['data' => $apiData], JsonResponse::HTTP_OK);
        }

        // If the request doesn't match 'html' or 'json', you can handle it accordingly
        return response()->json(['message' => 'Invalid request type.'], JsonResponse::HTTP_BAD_REQUEST);
    }

    public function Logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/admin/login');
        }
    }
}
