<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainerPhpactor\Factory;

use Cspray\AnnotatedContainer\Attribute\ServiceDelegate;
use Cspray\AnnotatedContainerPhpactor\Repository\WidgetRepository;
use Cspray\AnnotatedContainerPhpactor\Services\WidgetService;
use Phpactor\Container\PhpactorContainer;

final class WidgetServiceFactory {

    private function __construct() {}

    #[ServiceDelegate]
    public static function createWidgetService(PhpactorContainer $container) : WidgetService {
        return new WidgetService($container->get(WidgetRepository::class));
    }

}