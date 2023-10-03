<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;


class ApiService
{
    protected $client;

    public function __construct()
    {
        
        $this->client = new Client([
            'base_uri' => config('app.api_url'), // Base API URL
        ]);
    }

    public function getHeaders(){
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        if (Session::has('access_token')) {
            $headers['Authorization'] = 'Bearer ' . Session::get('access_token');
        }

        return $headers;

    }

    public function post($endpoint, $data)
    {
        try {
            $headers = $this->getHeaders();
            $response = $this->client->post($endpoint, [
                'json' => $data,
                'headers' => $headers,
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Handle API request errors here
            return [
                'error' => $e->getMessage(),
            ];
        }
    }
    
    public function get($endpoint)
    {
        try {
            $headers = $this->getHeaders();

            $response = $this->client->get($endpoint,[
                'headers' => $headers,
            ]);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }

    public function put($endpoint, $data)
    {
        try {
            $headers = $this->getHeaders();

            $response = $this->client->put($endpoint, [
                'json' => $data,
                'headers' => $headers,

            ]);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }

    public function delete($endpoint)
    {
        try {
            $headers = $this->getHeaders();

            $response = $this->client->delete($endpoint,[
                'headers' => $headers,
            ]);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }

    // You can add more methods for other HTTP methods if needed
}
