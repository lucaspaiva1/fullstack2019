<?php

declare(strict_types=1);

use App\Application\Actions\Pet\ListPetsAction;
use App\Application\Actions\Pet\ViewPetAction;
use App\Application\Actions\Pet\StorePetAction;
use App\Application\Actions\Pet\UpdatePetAction;
use App\Application\Actions\Species\ListSpeciesAction;
use App\Application\Actions\Breed\ListBreedAction;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Exception\HttpNotFoundException;

return function (App $app) {
    
    $container = $app->getContainer();

    $app->options('/{routes:.+}', function ($request, $response, $args) {
        return $response;
    });

    /**
     * Enable Cors
     */
    $app->add(function ($request, $handler) {
        $response = $handler->handle($request);
        return $response
            ->withHeader('Access-Control-Allow-Origin', 'http://localhost:8080')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    });

    /**
     * Enable Json
     */
    $app->add(function ($request, $handler) {
        $contentType = $request->getHeaderLine('Content-Type');
        if (strstr($contentType, 'application/json')) {
            $contents = json_decode(file_get_contents('php://input'), true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $request = $request->withParsedBody($contents);
            }
        }
        return $handler->handle($request);
    });

    $app->get('/breeds', ListBreedAction::class);

    $app->get('/species', ListSpeciesAction::class);

    $app->group('/pets', function (Group $group) use ($app) {
        $group->get('', ListPetsAction::class);
        $group->post('', StorePetAction::class);
        $group->get('/{id}', ViewPetAction::class);
        $group->put('/{id}', UpdatePetAction::class);
    });

    /*
     * Catch-all route to serve a 404 Not Found page if none of the routes match
     * NOTE: make sure this route is defined last
     */
    $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
        throw new HttpNotFoundException($request);
    });
};
