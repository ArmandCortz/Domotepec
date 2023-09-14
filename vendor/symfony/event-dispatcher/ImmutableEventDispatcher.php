<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\EventDispatcher;

/**
 * A read-only proxy for an event dispatcher.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class ImmutableEventDispatcher implements EventDispatcherInterface
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(object $event, string $eventName = null): object
    {
        return $this->dispatcher->dispatch($event, $eventName);
    }

    /**
     * {@inheritdoc}
     */
    public function addListener(string $eventName, $listener, int $priority = 0)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    /**
     * {@inheritdoc}
     */
    public function addSubscriber(EventSubscriberInterface $subscriber)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    /**
     * {@inheritdoc}
     */
    public function removeListener(string $eventName, $listener)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    /**
     * {@inheritdoc}
     */
    public function removeSubscriber(EventSubscriberInterface $subscriber)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function getListeners(string $eventName = null)
=======
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
    public function getListeners(string $eventName = null): array
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
    {
        return $this->dispatcher->getListeners($eventName);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function getListenerPriority(string $eventName, $listener)
=======
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
    public function getListenerPriority(string $eventName, callable|array $listener): ?int
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
    {
        return $this->dispatcher->getListenerPriority($eventName, $listener);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function hasListeners(string $eventName = null)
=======
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
    public function hasListeners(string $eventName = null): bool
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
    {
        return $this->dispatcher->hasListeners($eventName);
    }
}
