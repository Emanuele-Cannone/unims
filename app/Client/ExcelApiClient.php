<?php

namespace App\Client;

class ExcelApiClient extends AbstractApiClient
{
    public function new_page($name, $csv_data)
    {
        $endpoint = '/page-manager/main/new-page';
        $data = [
            'name' => $name,
            'type' => 'TABLE',
            'json_csv' => $csv_data
        ];
        return $this->post($endpoint, $data);
    }

    public function import_to_page($name, $csv_data)
    {
        $endpoint = '/page-manager/main/import-to-page';
        $data = [
            'name' => $name,
            'json_csv' => $csv_data
        ];
        return $this->put($endpoint, $data);
    }
}