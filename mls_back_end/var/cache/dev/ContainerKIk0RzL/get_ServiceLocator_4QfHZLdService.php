<?php

namespace ContainerKIk0RzL;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_4QfHZLdService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.4QfHZLd' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.4QfHZLd'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'serializerInterface' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
            'tutorialRepository' => ['privates', 'App\\Repository\\TutorialRepository', 'getTutorialRepositoryService', true],
        ], [
            'serializerInterface' => '?',
            'tutorialRepository' => 'App\\Repository\\TutorialRepository',
        ]);
    }
}
