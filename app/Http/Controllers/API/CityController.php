<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use GuzzleHttp\Psr7\Response;
use App\Repositories\DefaultRepository;
use Illuminate\Http\Request;

class CityController extends Controller
{

    protected $city;
    protected $repository;

    public function __construct(City $city){
        $this->city = $city;
        $this->repository = new DefaultRepository($this->city);
    }
    
    public function index(Request $request)
    {
        try{             
            if ($request->has('att_state')) {
                $att_state = 'state:id,' .  $request->att_state;
                $this->repository->selectAttributesRelated($att_state);
            } else {
                $this->repository->selectAttributesRelated('state');
            }

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
