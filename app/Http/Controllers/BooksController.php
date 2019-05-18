<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books', [
            'books' => $books
        ]);
    }

    public function edit(Book $id)
    {
        $book = Book::find($id)->first();
        return view('update', [
            'book' => $book
        ]);
    }

    public function store() 
    {
    	Book::create($this->validateRequest());

        return redirect('/');
    }

    public function update(Book $id) 
    {
        $result = $id->update(request()->validate([
            'author' => 'required',
        ]));
        if($result) {
            request()->session()->flash('success', 'Author successfully updated!');
        }

        else {
            request()->session()->flash('warning', 'Book Not updated!');
        }

        return redirect('/');
    }

    public function destroy(Book $id)
    {
        $id->delete();

        return redirect('/');
    }

    public function export()
    {
        $data = request()->validate([
            'exportType' => 'required',
            'content' => 'required',
        ]);

        //$content = array(1 => 'title', 2 => 'author', 3 =>'*');
        $books = Book::select('title', 'author')
               ->get();

        $data = array();
        foreach ($books as $key=>$value) {
            if(request()->content == 1) {
                $data[$key]['title'] = $value->title;
            }
            else if (request()->content == 2) {
                $data[$key]['author'] = $value->author;
            }
            else if (request()->content == 3) {
                $data[$key]['title'] = $value->title;
                $data[$key]['author'] = $value->author;
            }
        }

        if(request()->exportType == "csv") {

            $this->array_to_csv_download($data);

        }
        else if (request()->exportType == "xml") {
            $content        = \View::make('booksXML', ['books'      => $data ]);
            return \Response::make($content)->header('Content-Type', 'text/xml;charset=utf-8');
            //->header('Content-Disposition', 'attachment; filename="export.xml"')
        }
    }

    protected function validateRequest()
    {
    	return request()->validate([
    		'title' => 'required',
    		'author' => 'required',
    	]);
    }

    protected function array_to_csv_download($array, $filename = "books-", $delimiter=",") {
        header('Content-Encoding: UTF-8');
        header('Content-Type: application/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="'.$filename. date('y-m-d.h:i:s') . '.csv'. '";');
        echo "\xEF\xBB\xBF";

        // open the "output" stream
        // see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
        $f = fopen('php://output', 'w');

        foreach ($array as $line) {
            fputcsv($f, $line, $delimiter);
        }
        //fpassthru($f);
    }

    
}
