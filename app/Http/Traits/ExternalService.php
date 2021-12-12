<?php

namespace App\Http\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

trait ExternalService
{

    /**
     * @throws GuzzleException
     */
    public function performRequest($method, $requestUrl, $formParams = [], $headers = []): string
    {


        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

         dd( $this->baseUri);
//        if (isset($this->secret)) {
//            $headers['Authorization'] = $this->secret;
//        }
//
//
//        $response = $client->request($method, $requestUrl, ['form_params' => $formParams, 'headers' => $headers ]);
//
//        return $response->getBody()->getContents();
    }

}
