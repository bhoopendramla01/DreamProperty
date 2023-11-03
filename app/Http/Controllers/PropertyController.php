<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\RepositoryInterfaces;
use myMessage;
// use Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\MessageTrait;

class PropertyController extends Controller
{
    private $repositoryInterfaces;
    use MessageTrait;
    public function __construct(RepositoryInterfaces $repositoryInterfaces)
    {
        $this->repositoryInterfaces = $repositoryInterfaces;
    }

    public function getProperty()
    {
        $table = 'properties';
        $properties = $this->repositoryInterfaces->all($table);

        if(!$properties)
        {
            return $this->errorMessage(myMessage::GET_PROPERTY_ERROR);
        }
        else
        {
            return $this->successMessage(myMessage::GET_PROPERTY,$properties);
        } 
    }

    public function addProperty(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        $table = 'properties';
        $property = $this->repositoryInterfaces->store($table,$data);
    
        if(!$property)
        {
            return $this->errorMessage(myMessage::ADD_PROPERTY_ERROR);
        }
        else
        {
            return $this->successMessage(myMessage::ADD_PROPERTY,'');
        }        
    }

    public function destroyProperty(Request $request)
    {
        $table = 'properties';
        $id = $request->id;
        $property = $this->repositoryInterfaces->destroy($table,$id);
    
        if(!$property)
        {
            return $this->errorMessage(myMessage::DELETE_PROPERTY_ERROR);
        }
        else
        {
            return $this->successMessage(myMessage::DELETE_PROPERTY,'');
        }        
    }

    public function updateProperty(Request $request)
    {
        $table = 'properties';
        $id = $request->id;
        $property = $this->repositoryInterfaces->update($table,$request,$id);
    
        if(!$property)
        {
            return $this->errorMessage(myMessage::UPDATE_PROPERTY_ERROR);
        }
        else
        {
            return $this->successMessage(myMessage::UPDATE_PROPERTY,'');
        }        
    }

    
}
