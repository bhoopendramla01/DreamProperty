<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\RepositoryInterfaces;
use myMessage;
// use Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\MessageTrait;

class CategoryController extends Controller
{
    private $repositoryInterfaces;
    use MessageTrait;
    public function __construct(RepositoryInterfaces $repositoryInterfaces)
    {
        $this->repositoryInterfaces = $repositoryInterfaces;
    }

    public function getCategory()
    {
        $table = 'categories';
        $categories = $this->repositoryInterfaces->all($table);

        if(!$categories)
        {
            return $this->errorMessage(myMessage::GET_CATEGORY_ERROR);
        }
        else
        {
            return $this->successMessage(myMessage::GET_CATEGORY,$categories);
        } 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
        ]);

        $table = 'categories';
        $category = $this->repositoryInterfaces->store($table,$data);
    
        if(!$category)
        {
            return $this->errorMessage(myMessage::ADD_CATEGORY_ERROR);
        }
        else
        {
            return $this->successMessage(myMessage::ADD_CATEGORY,'');
        }        
    }

    public function destroy(Request $request)
    {
        $table = 'categories';
        $id = $request->id;
        $category = $this->repositoryInterfaces->destroy($table,$id);
    
        if(!$category)
        {
            return $this->errorMessage(myMessage::DELETE_CATEGORY_ERROR);
        }
        else
        {
            return $this->successMessage(myMessage::DELETE_CATEGORY,'');
        }        
    }

    public function update(Request $request)
    {
        $table = 'categories';
        $id = $request->id;
        $category = $this->repositoryInterfaces->update($table,$request,$id);
    
        if(!$category)
        {
            return $this->errorMessage(myMessage::UPDATE_CATEGORY_ERROR);
        }
        else
        {
            return $this->successMessage(myMessage::UPDATE_CATEGORY,'');
        }        
    }

    
}
