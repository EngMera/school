<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\FeeInvoice;
use App\Repository\FeeInvoiceRepositoryInterface;
use Illuminate\Http\Request;

class FeeInvoiceController extends Controller
{
    protected $FeeInvoice;
    public function __construct(FeeInvoiceRepositoryInterface $FeeInvoice)
    {
        $this->FeeInvoice = $FeeInvoice;
    }
    public function index()
    {
        return  $this->FeeInvoice->index();
        
    }
    public function show($id)
    {
        return  $this->FeeInvoice->show($id);

    }
    public function store(Request $request)
    {
        return  $this->FeeInvoice->store($request);
    }
    public function edit($id)
    {
        return  $this->FeeInvoice->edit($id);

    }
    public function update(Request $request)
    {
        return  $this->FeeInvoice->update($request);

    }
    public function destroy(Request $request)
    {
        return  $this->FeeInvoice->destroy($request);

    }

}
