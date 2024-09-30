<?php

namespace App\Actions\Content;

use App\Core\CoreAction;
use Psr\Http\Message\ResponseInterface;

class ViewBookAction extends CoreAction
{
    private array $books = [
        [
            "title" => "Build a Fort",
            'summary' => "Join Jameel and Elias as they make a fort using blankets and pillows. They crawl inside and play in their secret hideout!"
        ],
        [
            "title" => "Play Soccer",
            "summary" => "Watch Jameel and Elias kick the soccer ball. They run and work together to score a big goal!"
        ],
        [
            "title" => "Ride Bikes",
            "summary" => "Read about how fast Jameel and Elias can ride their bikes. They zoom around the park and have lots of fun!"
        ],
        [
            "title" => "Fly a Plane",
            "summary" => "Come fly high in a plane with Jameel and Elias. They look down at the clouds and pretend to be pilots!"
        ],
        [
            "title" => "Explore the Jungle",
            "summary" => "Take a walk with Jameel and Elias through the jungle. They see animals and find a hidden treasure!"
        ],
    ];

    public function invoke(): ResponseInterface
    {
        $title = null;

        $request = $this->request;

        ray($this->getArguments());

        $id = $this->getArguments()['id'] ?? null;

        if ($id && isset($this->books[$id - 1]['title'])) {
            $title = "The McCant's Boys Can: {$this->books[$id - 1]['title']}";
        }

        if ($id && isset($this->books[$id - 1]['summary'])) {
            $summary = "The McCant's Boys Can: {$this->books[$id - 1]['summary']}";
        }

        return $this->getView()->render($this->getResponse(), 'Pages/book.php', compact('title', 'summary'));
    }
}