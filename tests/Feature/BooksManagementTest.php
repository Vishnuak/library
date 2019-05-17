<?php

namespace Tests\Feature;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_book_can_be_added_to_library() 
    {

        $this->withoutExceptionHandling();

        $response = $this->post('/',$this->data());


        $response->assertStatus(200);
        $this->assertCount(1, Book::all());
    }


    /** @test */
    public function book_title_is_required() 
    {

        $response = $this->post('/', [
            'title' => '',
            'author' => 'Jhon',
        ]);


        $response->assertSessionHasErrors('title');

    }


    /** @test */
    public function book_author_is_required() 
    {

        $response = $this->post('/', [
            'title' => 'Book',
            'author' => '',
        ]);


        $response->assertSessionHasErrors('author');

    }


    /** @test */
    public function a_book_can_be_deleted() 
    {

        $response = $this->post('/',$this->data());
        
        $book = Book::first();

        $response = $this->delete('/' . $book->id);

        $this->assertCount(0, Book::all());

        $response->assertRedirect('/');

    }

    /** @test */

    public function a_author_can_be_updated()
    {

        $response = $this->post('/', $this->data());

        $book = Book::first();

        $response = $this->patch('/' . $book->id, [
            'author' => 'Ruskin Bond',
        ]);

        $this->assertEquals('Ruskin Bond', Book::first()->author);
        $response->assertRedirect('/');


    }


    protected function data()
    {
        return [
            'title' => 'Alice in Wonderland',
            'author' => 'Lewis Caroll',
        ];
    }
}
