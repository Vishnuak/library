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

        $response = $this->post('/',[
            'title' => 'Alice in Wonderland',
            'author' => 'Lewis Caroll',
        ]);


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
}
