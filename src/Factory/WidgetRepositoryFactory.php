<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainerPhpactor\Factory;

use Cspray\AnnotatedContainer\Attribute\ServiceDelegate;
use Cspray\AnnotatedContainerPhpactor\Repository\WidgetRepository;

final class WidgetRepositoryFactory {

    private function __construct() {}

    #[ServiceDelegate]
    public static function createWidgetRepository() : WidgetRepository {
        return new WidgetRepository();
    }

}