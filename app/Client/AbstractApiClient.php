<?php

namespace App\Client;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

abstract class AbstractApiClient implements ApiClientInterface
{
    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = env('BACKEND_GATEWAY_URL');
    }

    private function make_request(string $method, string $endpoint, array $data = [])
    {
        $client = new Client();

        $options = [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Accept' => 'application/json',
            ],
        ];

        if ($method === 'GET') {
            $options['query'] = $data;
        } else {
            $options['json'] = $data;
        }

        $response = $client->request($method, $endpoint, $options);

        return json_decode($response->getBody(), true);
    }

    public function get(string $endpoint, array $data = []){
        return $this->make_request(Request::METHOD_GET, $endpoint, $data);
    }

    public function post(string $endpoint, array $data = []){
        return $this->make_request(Request::METHOD_POST, $endpoint, $data);
    }
    
    public function put(string $endpoint, array $data = []){
        return $this->make_request(Request::METHOD_PUT, $endpoint, $data);
    }
    public function delete(string $endpoint, array $data = []){
        return $this->make_request(Request::METHOD_DELETE, $endpoint, $data);
    }
}