<?php

namespace ContainerMw8WTxB;
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'persistence'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'Persistence'.\DIRECTORY_SEPARATOR.'ObjectManager.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolderf10ef = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer58a42 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties58833 = [
        
    ];

    public function getConnection()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'getConnection', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'getMetadataFactory', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'getExpressionBuilder', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'beginTransaction', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'getCache', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->getCache();
    }

    public function transactional($func)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'transactional', array('func' => $func), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->transactional($func);
    }

    public function commit()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'commit', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->commit();
    }

    public function rollback()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'rollback', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'getClassMetadata', array('className' => $className), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'createQuery', array('dql' => $dql), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'createNamedQuery', array('name' => $name), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'createQueryBuilder', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'flush', array('entity' => $entity), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'clear', array('entityName' => $entityName), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->clear($entityName);
    }

    public function close()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'close', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->close();
    }

    public function persist($entity)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'persist', array('entity' => $entity), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'remove', array('entity' => $entity), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'refresh', array('entity' => $entity), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'detach', array('entity' => $entity), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'merge', array('entity' => $entity), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'getRepository', array('entityName' => $entityName), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'contains', array('entity' => $entity), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'getEventManager', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'getConfiguration', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'isOpen', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'getUnitOfWork', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'getProxyFactory', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'initializeObject', array('obj' => $obj), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'getFilters', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'isFiltersStateClean', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'hasFilters', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return $this->valueHolderf10ef->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer58a42 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolderf10ef) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderf10ef = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolderf10ef->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, '__get', ['name' => $name], $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        if (isset(self::$publicProperties58833[$name])) {
            return $this->valueHolderf10ef->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf10ef;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderf10ef;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf10ef;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderf10ef;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, '__isset', array('name' => $name), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf10ef;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderf10ef;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, '__unset', array('name' => $name), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf10ef;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderf10ef;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, '__clone', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        $this->valueHolderf10ef = clone $this->valueHolderf10ef;
    }

    public function __sleep()
    {
        $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, '__sleep', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;

        return array('valueHolderf10ef');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer58a42 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer58a42;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer58a42 && ($this->initializer58a42->__invoke($valueHolderf10ef, $this, 'initializeProxy', array(), $this->initializer58a42) || 1) && $this->valueHolderf10ef = $valueHolderf10ef;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderf10ef;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderf10ef;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
