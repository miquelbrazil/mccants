<?php

namespace App\Actions\Content;

use App\Core\CoreAction;
use Cake\Core\Configure;
use Psr\Http\Message\ResponseInterface;

class ViewBookAction extends CoreAction
{
    public function invoke(): ResponseInterface
    {
        $books = Configure::read('Books');
        $title = null;

        $id = $this->getArguments()['id'] ?? null;

        if ($id && isset($books[$id - 1])) {
            $title = $books[$id - 1]["title"] ?? null;
            if ($title) {
                $title = "The McCant's Boys Can: {$title}";
            }

            $summary = $books[$id - 1]["summary"] ?? null;
        }

        return $this->getView()->render($this->getResponse(), 'Pages/book.php', compact('title', 'summary'));
    }
}