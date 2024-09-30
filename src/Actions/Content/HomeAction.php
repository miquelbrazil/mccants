<?php
namespace App\Actions\Content;
use App\Core\CoreAction;
use Psr\Http\Message\ResponseInterface;

class HomeAction extends CoreAction
{
    public function invoke(): ResponseInterface
    {
        return $this->getView()->render($this->getResponse(), 'Pages/home.php', []);
    }
}