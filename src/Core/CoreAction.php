<?php

namespace App\Core;

use Cake\Chronos\ChronosDate;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;
use Faker\Factory as Faker;
use Faker\Generator as FakerGenerator;
use Odan\Session\Flash;
use Slim\Interfaces\RouteParserInterface;
use Slim\Routing\RouteContext;

abstract class CoreAction
{
    protected ServerRequestInterface $request;

    protected ResponseInterface $response;

    private PhpRenderer $renderer;

    private Flash|null $_flash;

    private RouteParserInterface $Router;

    protected array $arguments;

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $this->_initialize($request, $response);

        $this->response = $this->invoke();

        return $this->response;
    }

    protected function _initialize(ServerRequestInterface $request, ResponseInterface $response)
    {
        $this->request = $request;
        $this->response = $response;

        $this->Router = RouteContext::fromRequest($request)->getRouteParser();

        $this->arguments = $request->getAttribute('__route__')->getArguments();

        $this->request = $this->getRequest()->withAttribute('__renderer__', $this->getView());

        if (method_exists($this, 'initialize')) {
            $this->initialize();
        }
    }

    protected function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }

    protected function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    protected function getView(): PhpRenderer
    {
        if (!isset($this->renderer)) {
            $this->renderer = new PhpRenderer(TEMPLATES);
        }

        if (empty($this->renderer->getLayout())) {
            $this->renderer->setLayout('Layouts/default.php');
        }

        $this->renderer->addAttribute('now', ChronosDate::now());
        $this->renderer->addAttribute('version', time());
        $this->renderer->addAttribute('Router', $this->getRouter());

        return $this->renderer;
    }

    protected function getRouter(): RouteParserInterface
    {
        return $this->Router;
    }

    protected function getArguments(): array
    {
        return $this->arguments;
    }

    abstract public function invoke(): ResponseInterface;

    protected function initialize(): void
    {
        // override this method to initialize the action
    }
}
