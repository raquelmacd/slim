<?php

declare(strict_types=1);

use App\Banco\Conexao;
use App\Handler\BuscarAluno;
use App\Handler\CriarALuno;
use App\Handler\ListarAluno;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

require_once "../vendor/autoload.php";

$app = AppFactory::create();
$app->addErrorMiddleware(true,true,true);

$app->group('/aluno', function(RouteCollectorProxy $group)  {

    $group->get('', ListarAluno::class);
    $group->get('/{id}', BuscarAluno::class);
    $group->post('', CriarALuno::class);
});

$app->run();