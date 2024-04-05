<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class APIDemoController extends Controller {
    public function index() {
        $api_url = 'http://localhost:8075/rm/api/v1/admin/schedules';
        
        // GET
        $headers = [
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJkdW9uZ2NkaGUxNzYzMTJAZ21haWwuY29tIiwiaWF0IjoxNzExMDkzMzk4LCJleHAiOjE3MTExNzk3OTh9.pIRe1jfQTqw0moyrt3HFa00U0kbMUmClOTobgapJRYk'
        ];

        $response = Http::withHeaders($headers)->get($api_url);
        $body = [
            "email" => $emailfillter,
            "phone" => $phonefillter
        ];
        // POST
        $response_post = Http::post($api_url, $body);
        
        $statusCode = $response->status();            
        $data = '';
        if ($statusCode == 200) {
            $responseBody = json_decode($response->getBody(), true);
            $data = $responseBody;
        }

        return view('apidemo.index', ['data'=> $data, 'status'=> $statusCode]);
    }
}