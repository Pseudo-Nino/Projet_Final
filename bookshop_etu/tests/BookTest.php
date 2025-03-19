<?php
namespace Cesi\Bookshop\Tests;

use Cesi\Bookshop\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase {
    
    public function testGetTitle() {
        $book = new Book('The Hobbit', 'J.R.R. Tolkien', '9780261102217');
        $this->assertSame('The Hobbit', $book->getTitle());
    }
    public function testGetAuthor() {
        // TODO: Implement testGetAuthor() method.
        $this->assertTrue(false);
    }
    public function testGetIsbn() {
        // TODO: Implement testGetIsbn() method.
        $this->assertTrue(false);
    }
}