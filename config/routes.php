<?php

use App\Actions\Content\BooksAction;
use App\Actions\Content\BooksListAction;
use App\Actions\Content\HomeAction;
use App\Actions\Content\ViewBookAction;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->get('[/]', HomeAction::class);

    $app->group('/book', function (RouteCollectorProxy $books) {
        $books->get('s[/]', BooksListAction::class);
        $books->get('/{id}', ViewBookAction::class);
    });

    return $app;
};
