<?php

namespace App\Http\Actions\Accounting;

use App\Http\Traits\ExternalService;
use GuzzleHttp\Exception\GuzzleException;

class AccountingTypesAction
{
    use ExternalService;

    public $baseUri;
    public $secret;


    public function __construct()
    {
        $this->baseUri = config('services.accounting.base_uri');
        $this->secret = config('services.accounting.secret');

    }

    /**
     * @throws GuzzleException
     */
    public function index(): string
    {
        return $this->performRequest('GET' , 'accounting/account-types');
    }

    public function store()
    {


    }

    public function update()
    {

    }

    public function destroy()
    {

    }


}
