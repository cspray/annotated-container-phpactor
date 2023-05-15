<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainerPhpactor\Repository;

use Cspray\AnnotatedContainer\Attribute\Service;
use Cspray\AnnotatedContainerPhpactor\Widget;

#[Service]
class WidgetRepository {

    private array $store = [];

    public function save(Widget $widget) : void {
        $this->store[$widget->id] = $widget;
    }

    public function get(string $id) : ?Widget {
        return $this->store[$id] ?? null;
    }

}