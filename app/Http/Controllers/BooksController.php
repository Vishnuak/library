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

    public function update(Book $id) 
    {
        $id->update(request()->validate([
            'author' => 'required',
        ]));

        return redirect('/');
    }

    public function destroy(Book $id)
    {
        $id->delete();

        return redirect('/');
    }

    protected function validateRequest()
    {
    	return request()->validate([
    		'title' => 'required',
    		'author' => 'required',
    	]);
    }
}
