<?php

namespace App\Http\Controllers;

use App\Building;
use App\Extinguisher;
use App\Http\Resources\ExtinguisherResource;
use App\Http\Resources\ExtinguisherResourceCollection;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\queue;

class ExtinguisherController extends Controller
{
    public function show(Extinguisher $extinguisher) : ExtinguisherResource{

        return new ExtinguisherResource($extinguisher);

    }

    //return all extinguisher in database
    public function index(Request $request) : ExtinguisherResourceCollection{
        $buildingId = $request->query('building_id');


        $building = Extinguisher::where('building_id', '=', $buildingId)->paginate(15);

        return new ExtinguisherResourceCollection($building);
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
            'extinguisher_manufacturedate' => 'required',
            'extinguisher_htestdate' => 'required',
            'extinguisher_servicedate' => 'required',
            'extinguisher_nextservicedate' => 'required',
            'extinguisher_comment' => 'required',
            'extinguisher_status' => 'required',
            'extinguisher_photourl' => 'required',
            'building_id' => 'required'
        ]);



        // creates a extinguisher once pass validation
        $extinguisher = Extinguisher::create($request->all());

        return new ExtinguisherResource($extinguisher);

    }

    // update extinguisher info
    public function update(Extinguisher $extinguisher, Request $request): ExtinguisherResource {

        $extinguisher->update($request->all());

        return new ExtinguisherResource($extinguisher);
    }

    // delete extinguisher
    public function destroy(Extinguisher $extinguisher) {
        $extinguisher->delete();

        return response()->json();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUploadPost(Request $request, $id)
    {

        request()->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $destinationPath = public_path('/images');
        //print $destinationPath;
        $image = $request->file('file');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $image->move($destinationPath, $input['imagename']);


        $dbPath = 'images/'.$input['imagename'];

        print ($dbPath);
        //extinguisher/id/fileupload
        $extinguisher = Extinguisher::find($id);
        $extinguisher->extinguisher_photourl = $dbPath;

        $extinguisher->save();
        return new ExtinguisherResource($extinguisher);

    }



}
