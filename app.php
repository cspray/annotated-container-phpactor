<?php declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Cspray\AnnotatedContainer\Bootstrap\Bootstrap;
use Cspray\AnnotatedContainerPhpactor\PhpactorContainerFactory;
use Cspray\AnnotatedContainerPhpactor\Services\WidgetService;

$bootstrap = new Bootstrap(
    containerFactory: new PhpactorContainerFactory()
);

$container = $bootstrap->bootstrapContainer();

$service = $container->get(WidgetService::class);

$service->createWidget('Annotated Container and Phpactor');

$widget = $service->fetchWidget('Annotated Container and Phpactor');

var_dump($widget);