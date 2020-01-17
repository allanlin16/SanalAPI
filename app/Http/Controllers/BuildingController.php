<?php

namespace App\Http\Controllers;
use App\Building;
use App\Http\Resources\BuildingResource;
use App\Http\Resources\BuildingResourceCollection;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    //
    public  function show(Building $building) : BuildingResource {


        return new BuildingResource($building);
    }


    /**
     * @return BuildingResourceCollection
     * display * in the building table
     */
    public function index(): BuildingResourceCollection {

        return new BuildingResourceCollection(Building::paginate());

    }
}
