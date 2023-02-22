<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\GraduatedRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    protected $Graduated;
    public function __construct(GraduatedRepositoryInterface $Graduated)
    {
        $this->Graduated = $Graduated;
    }
    public function index()
    {
        return $this->Graduated->index();
    }
    public function create()
    {
        return $this->Graduated->create();
    }
    public function SoftDelete(Request $request)
    {
        return $this->Graduated->SoftDelete($request);
    }
    public function ReturnData(Request $request)
    {
        return $this->Graduated->ReturnData($request);
    }
    public function destroy(Request $request)
    {
        return $this->Graduated->destroy($request);
    }
}
