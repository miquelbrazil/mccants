<?php

namespace App\Actions\Content;

use App\Core\CoreAction;
use Cake\Core\Configure;
use Psr\Http\Message\ResponseInterface;

class BooksListAction extends CoreAction
{
    public function invoke(): ResponseInterface
    {
        $books = Configure::read('Books');

        return $this->getView()->render($this->getResponse(), 'Pages/books.php', compact('books'));
    }
}