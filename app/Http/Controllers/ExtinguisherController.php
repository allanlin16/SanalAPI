<?php

namespace App\Http\Controllers;

use App\Extinguisher;
use App\Http\Resources\ExtinguisherResource;
use App\Http\Resources\ExtinguisherResourceCollection;
use Illuminate\Http\Request;

class ExtinguisherController extends Controller
{
    public function show(Extinguisher $extinguisher) : ExtinguisherResource{

        return new ExtinguisherResource($extinguisher);

    }

    //return all extinguisher in database
    public function index() : ExtinguisherResourceCollection{

        return new ExtinguisherResourceCollection(Extinguisher::paginate());
    }

    //create new extinguisher
    public function store(Request $request) {

        $request->validate([
            'extinguisher_make' => 'required',
            'extinguisher_serialnumber' => 'required',
            'extinguisher_barcodenumber' => 'required',
            'extinguisher_locationarea' => 'required',
            'extinguisher_locationdescription' => 'required',
            'extinguisher_type' => 'required',
            'extinguisher_rating' => 'required',
            'extinguisher_size' => 'required',
            'extinguisher_manufacturedate' => 'required',
            'extinguisher_htestdate' => 'required',
            'extinguisher_servicedate' => 'required',
            'extinguisher_nextservicedate' => 'required',
            'extinguisher_comment' => 'required',
            'extinguisher_status' => 'required'
        ]);

        // creates a extinguisher once pass validation
        $extinguisher = Extinguisher::create($request->all());

        return new ExtinguisherResource($extinguisher);

    }

    // update client info
    public function update(Extinguisher $extinguisher, Request $request): ExtinguisherResource {

        $extinguisher->update($request->all());

        return new ExtinguisherResource($extinguisher);
    }


}
