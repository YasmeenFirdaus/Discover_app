<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\CategoryMaster;
use App\Models\ApiData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; 

class ApiDataController extends Controller
{ 
    // To view category 

    public function CategoryView(){
        $api_category = DB::table('category_master')->get();
        if(!$api_category){
            $response =array(
                "status"=> false,
                "message" => "category not found"
            );
            return $response;
        }

        $data =json_encode($api_category);
        return response()-> json($api_category);
    }


// to view data through api 
    public function DataView($category){
        $api_data = DB::table('api_data')->where('category_id',$category)->get();

        if(!$api_data){
            $response = array(
                "status" => false,
                "message" => "data not found"
            );

            return $response;
        }

        $data = json_encode($api_data);
        // dd($sub);
        return response()->json($api_data);
    }


    public function fetchDataAndDisplay()
    {
        $apis = Api::all();
        $apiDataList = [];

        foreach ($apis as $api) {
            try {
                // Skip if the API has already been fetched
                if ($api->fetched) {
                    Log::info('Skipping API URL as already fetched.', ['url' => $api->api_url]);
                    continue;
                }
                // Make API request
                $apiResponse = Http::get($api->api_url);

                // Determine the content type of the response
                $contentType = $apiResponse->header('Content-Type');

                // Initialize the data variable
                $responseData = null;

                if (Str::contains($contentType, 'json')) {
                    // Handle JSON response
                    $responseData = $this->handleJsonResponse($apiResponse->json());
                } elseif (Str::contains($contentType, 'xml')) {
                    // Handle XML response
                    $responseData = $this->handleXmlResponse($apiResponse->body());
                } else {
                    // For other content types, store the raw response as text
                    $responseData = ['content' => $apiResponse->body()];
                }

                // Loop through each data item and store it
            foreach ($responseData as $dataItem) {
                $this->storeData($api, $dataItem, $apiDataList);
            }

       // Mark the API as fetched
                $this->markApiAsFetched($api->id);
            } catch (\Exception $e) {
                // Log and handle exceptions
                Log::error('API Request Failed: ' . $e->getMessage());
                continue;
            }
        }

        // Combine existing data with newly fetched data
        $existingData = ApiData::all();
        $apiDataList = array_merge($existingData->toArray(), $apiDataList);

        // Return both view and JSON response
        if (request()->wantsJson()) {
            // If the request expects JSON, return JSON response
            return response()->json(['apiDataList' => $apiDataList], Response::HTTP_OK);
        } else {
            // If not, return the view
            return view('admin.dashboard.api_data', ['apiDataList' => $apiDataList]);
        }
    }
    
    private function storeData($api, $data, &$apiDataList)
    {
         // Customize this method to handle and store data for each type of response
         $category = $data['category'] ?? 'Uncategorized';

         // Get or create the CategoryMaster based on the category name
         $categoryMaster = CategoryMaster::firstOrCreate(['category_name' => $category]);
 
        // Customize this method to handle and store data for each type of response
        $apiData = new ApiData([
            'api_id' => $api->id,
            'category_id' => $categoryMaster->id,
            'title' => $data['title'] ?? '(No Title)',
            'description' => $data['description'] ?? '(No Description Available)',
            'image_url' => $data['image_url'] ?? 'https://example.com/default_image.png',
            'source_name' => $data['source_name'] ?? 'Unknown Source',
            'source_url' => $data['source_url'] ?? '',
            'url' => $data['url'] ?? '',
            'content_type' => $data['content_type'] ?? 'text/plain',
            'published_at' => isset($data['published_at'])
                ? is_string($data['published_at']) ? $data['published_at'] : date('Y-m-d H:i:s', $data['published_at'])
                : date('Y-m-d H:i:s'), // Default to current date and time if "published_at" is missing
            'author_name' => $data['author_name'] ?? 'Anonymous',
            'author_url' => $data['author_url'] ?? '',
            'category' => $data['category'] ?? 'Uncategorized',
            'tags' => isset($data['tags'])
                ? (is_array($data['tags']) ? json_encode($data['tags']) : $data['tags'])
                : null, // Set to null or a default value if "tags" is missing
            'metadata' => isset($data['metadata'])
                ? (is_array($data['metadata']) ? json_encode($data['metadata']) : $data['metadata'])
                : null, // Set to null or a default value if "metadata" is missing
            // ... other fields
        ]);
    
        $apiData->save();
    
        // Add the API data to the list
        $apiDataList[] = $apiData;
    }

    
    private function markApiAsFetched($apiId)
    {
        DB::table('apis')->where('id', $apiId)->update(['fetched' => true]);
    }

    private function handleJsonResponse($jsonResponse)
    {
        // Customize this method to handle JSON responses with varying structures
        $data = [];
    
        if (isset($jsonResponse['articles'][0])) {
            $articles = $jsonResponse['articles'];
        
            foreach ($articles as $article) {
                $data[] = [
                    'title' => $article['title'] ?? null,
                    'description' => $article['description'] ?? null,
                    'image_url' => $article['urlToImage'] ?? null,
                    'source_name' => $article['source']['name'] ?? null,
                    'source_url' => $article['url'] ?? null,
                    'url' => $article['url'] ?? null,
                    'content_type' => 'json',
                    'published_at' => isset($article['publishedAt'])
                        ? Carbon::parse($article['publishedAt'])->toDateTimeString()
                        : now()->toDateTimeString(),
                    'author_name' => $article['author'] ?? 'Unknown Author',
                    'author_url' => '', // Adjust based on the API response
                    'category' => $article['category'] ?? '',
                    'tags' => isset($article['tags'])
                        ? (is_array($article['tags']) ? json_encode($article['tags']) : $article['tags'])
                        : null,
                    'metadata' => $article['metadata'] ?? [],
                ];
            }
        }
         else {
            $data[] = [
                'title' => $jsonResponse['title'] ?? null,
                'description' => $jsonResponse['description'] ?? null,
                'image_url' => $jsonResponse['image_url'] ?? null,
                'source_name' => $jsonResponse['source_name'] ?? null,
                'source_url' => $jsonResponse['source_url'] ?? null,
                'url' => $jsonResponse['url'] ?? null,
                'content_type' => $jsonResponse['content_type'] ?? null,
                'published_at' => Carbon::parse($jsonResponse['published_at'])->toDateTimeString(),
                'author_name' => $jsonResponse['author_name'] ?? null,
                'author_url' => $jsonResponse['author_url'] ?? null,
                'category' => $jsonResponse['category'] ?? null,
                'tags' => $jsonResponse['tags'] ?? [],
                'metadata' => $jsonResponse['metadata'] ?? [],
            ];
        }

        return $data;
    }


    private function handleXmlResponse($xmlString)
    {
        try {
            // Log the XML response for debugging
            Log::info('XML Response:', ['response' => $xmlString]);
    
            $xml = simplexml_load_string($xmlString);
    
            $data = [];
    
            if ($xml && isset($xml->channel) && isset($xml->channel->item)) {
                foreach ($xml->channel->item as $item) {
                    $entry = [
                        'title' => isset($item->title) ? (string)$item->title : null,
                        'description' => isset($item->description) ? (string)$item->description : null,
                        'image_url' => isset($item->children('media', true)->content->attributes()['url']) ? (string)$item->children('media', true)->content->attributes()['url'] : '',
                        'source_name' => isset($item->source_name) ? (string)$item->source_name : '',
                        'source_url' => isset($item->source_url) ? (string)$item->source_url : '',
                        'url' => isset($item->link) ? (string)$item->link : '',
                        'content_type' => 'xml',
                        'published_at' => $this->parseXmlDate($item->pubDate),
                        'author_name' => isset($item->author) ? (string)$item->author : '',
                        'author_url' => isset($item->author_url) ? (string)$item->author_url : '',
                        'category' => isset($item->category) ? (string)$item->category : '',
                        'tags' => $this->parseXmlTags($item),
                        'metadata' => $this->parseXmlMetadata($item),
                        // ... other fields
                    ];
    
                    $data[] = $entry;
                }
            } else {
                // Log a warning if the expected structure is not found
                Log::warning('Unexpected XML structure: ' . $xmlString);
            }
    
            return $data;
        } catch (\Exception $e) {
            // Log and handle exceptions
            Log::error('Error processing XML response: ' . $e->getMessage());
            return [];
        }
    }
    private function parseXmlDate($pubDate)
{
    // You may need to adjust this based on the actual date format in your XML
    return $pubDate ? Carbon::parse($pubDate)->toDateTimeString() : now()->toDateTimeString();
}
private function parseXmlTags($item)
{
    // You may need to adjust this based on how tags are structured in your XML
    $tags = [];
    foreach ($item->tags as $tag) {
        $tags[] = (string)$tag->name;
    }
    return $tags;
}
private function parseXmlMetadata($item)
{
    // You may need to adjust this based on how metadata is structured in your XML
    $metadata = [];
    foreach ($item->metadata as $meta) {
        $metadata[(string)$meta->key] = (string)$meta->value;
    }
    return $metadata;
}


    



}
