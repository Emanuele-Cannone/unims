<?php

namespace App\Client;

interface ApiClientInterface
{
    public function get(string $endpoint, array $params = []);
    public function post(string $endpoint, array $data = []);
    public function put(string $endpoint, array $data = []);
    public function delete(string $endpoint, array $data = []);
}