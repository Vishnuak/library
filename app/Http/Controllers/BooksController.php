<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store() 
    {
    	Book::create($this->validateRequest());
    }


    protected function validateRequest()
    {
    	return request()->validate([
    		'title' => 'required',
    		'author' => 'required',
    	]);
    }
}