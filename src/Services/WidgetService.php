<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainerPhpactor\Services;

use Cspray\AnnotatedContainer\Attribute\Service;
use Cspray\AnnotatedContainerPhpactor\Repository\WidgetRepository;
use Cspray\AnnotatedContainerPhpactor\Widget;

#[Service]
final class WidgetService {

    public function __construct(
        private readonly WidgetRepository $repository
    ) {}

    public function createWidget(string $id) : Widget {
        $widget = new Widget($id);
        $this->repository->save($widget);
        return $widget;
    }

    public function fetchWidget(string $id) : ?Widget {
        return $this->repository->get($id);
    }

}