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


}
