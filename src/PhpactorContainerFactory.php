<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainerPhpactor;

use Cspray\AnnotatedContainer\AnnotatedContainer;
use Cspray\AnnotatedContainer\Autowire\AutowireableParameterSet;
use Cspray\AnnotatedContainer\ContainerFactory\ContainerFactory;
use Cspray\AnnotatedContainer\ContainerFactory\ContainerFactoryOptions;
use Cspray\AnnotatedContainer\ContainerFactory\ParameterStore;
use Cspray\AnnotatedContainer\Definition\ContainerDefinition;
use Phpactor\Container\PhpactorContainer;

class PhpactorContainerFactory implements ContainerFactory {

    public function createContainer(ContainerDefinition $containerDefinition, ContainerFactoryOptions $containerFactoryOptions = null) : AnnotatedContainer {
        $container = new PhpactorContainer();

        foreach ($containerDefinition->getServiceDelegateDefinitions() as $serviceDelegateDefinition) {
            $container->register(
                $serviceDelegateDefinition->getServiceType()->getName(),
                fn() => ($serviceDelegateDefinition->getDelegateType()->getName() . '::' . $serviceDelegateDefinition->getDelegateMethod())($container)
            );
        }

        return new class($container) implements AnnotatedContainer {

            public function __construct(
                private readonly PhpactorContainer $container
            ) {}

            public function getBackingContainer() : PhpactorContainer {
                return $this->container;
            }

            public function make(string $classType, AutowireableParameterSet $parameters = null) : object {
                throw new UnsupportedOperation();
            }

            public function invoke(callable $callable, AutowireableParameterSet $parameters = null) : mixed {
                throw new UnsupportedOperation();
            }

            public function get(string $id) {
                return $this->container->get($id);
            }

            public function has(string $id) : bool {
                return $this->container->has($id);
            }
        };
    }

    public function addParameterStore(ParameterStore $parameterStore) : void {
        throw new UnsupportedOperation();
    }
}