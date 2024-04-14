<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Repositories\DefaultRepository;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    protected $branch;
    protected $repository;

    public function __construct(Branch $branch){
        $this->branch = $branch;
        $this->repository = new DefaultRepository($this->branch);
    }
    
    public function index(Request $request)
    {
        try{             
           
            $this->repository->selectAttributesRelated('barbershop');
            $this->repository->selectAttributesRelated('city');

            if ($request->has('filter')) {
                $this->repository->filter($request->filter);                
            }

            if($request->has('att')){
                $this->repository->selectAttributes($request->att);
            }

            $result = $this->repository->getResult();

            return response()->json($result, 200);
        }catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while processing the request.'], 500);
        }
    }

    
    public function create()
    {

    }

   
    public function store(Request $request)
    {
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }
}
