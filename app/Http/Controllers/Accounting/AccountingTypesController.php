<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Actions\Accounting\AccountingTypesAction;
use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponse;

class AccountingTypesController extends Controller
{

    use ApiResponse;

    public function index(AccountingTypesAction $accountingTypesAction): string
    {

        return $this->successResponse( $accountingTypesAction->index());
    }

    public function store(AccountingTypesAction $accountingTypesAction){
        return $accountingTypesAction->store();
    }

    public function update(AccountingTypesAction $accountingTypesAction){
        return $accountingTypesAction->update();
    }

    public function destroy(AccountingTypesAction $accountingTypesAction){
        return $accountingTypesAction->destroy();
    }
}
