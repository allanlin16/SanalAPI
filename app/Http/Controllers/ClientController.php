<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ClientResourceCollection;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;


class ClientController extends Controller
{
    //return an array resource
   public function show(Client $client): ClientResource{

       return new ClientResource($client);

   }

   //return all client in database
   public function index(Request $request) : ClientResourceCollection{

       //client user_id
       $userId = $request->query('user_id');

       $client = Client::where('user_id', '=', $userId)->paginate(15);

       print($userId);



       return new ClientResourceCollection($client);
   }

   //create new client
    public function store(Request $request) {

        $user = Auth::user();

        $request->validate([
            'client_name' => 'required',
            'client_phone' => 'required',
            'client_address' => 'required',
            'client_email' => 'required',
            'user_id' => 'required',

        ]);


        // creates a client once pass validation
        $client = Client::create($request->all());

        return new ClientResource($client);

    }


    // update client info
    public function update(Client $client, Request $request): ClientResource {

        $client->update($request->all());

        return new ClientResource($client);
    }

    //delete client from db
    public function destroy(Client $client) {
        $client->delete();

        return response()->json();
    }

}
