<?php

namespace App\Http\Controllers;
use App\Building;
use App\Http\Resources\BuildingResource;
use App\Http\Resources\BuildingResourceCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function store(Request $request) {
        //create the building

        $request->validate([
           'building_name' => 'required',
            'building_address' => 'required',
            'building_city' => 'required',
            'building_postalcode' => 'required',
        ]);

        // creates a building once pass validation
        $building = Building::create($request->all());

        return new BuildingResource($building);

    }

    // update db
    public  function update(Building $building, Request $request): BuildingResource {

        $building->update($request->all());

        return new BuildingResource($building);
    }


    public function destroy(Building $building) {
        $building->delete();

        return response()->json();
    }
}
