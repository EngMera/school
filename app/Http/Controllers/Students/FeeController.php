<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeeRequest;
use App\Repository\FeeRepositoryInterface;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    protected $Fee;
    public function __construct(FeeRepositoryInterface $Fee)
    {
        $this->Fee = $Fee;
    }
    public function index()
    {
        return $this->Fee->index();
    }
    public function create()
    {
        return $this->Fee->create();
    }
    public function store(FeeRequest $request)
    {
        return $this->Fee->store($request);
    }
    public function edit($id)
    {
        return $this->Fee->edit($id);
    }
    public function update(FeeRequest $request)
    {
        return $this->Fee->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->Fee->destroy($request);
    }
}
