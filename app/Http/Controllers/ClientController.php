<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ClientResourceCollection;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    //return an array resource 
   public function show(Client $client): ClientResource{

       return new ClientResource($client);

   }

   //return all client in database
   public function index() : ClientResourceCollection{

       return new ClientResourceCollection(Client::paginate());
   }

}
