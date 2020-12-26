<?php

declare(strict_types=1);

namespace chaser\event;

use Psr\EventDispatcher\StoppableEventInterface;
use SplPriorityQueue;

/**
 * 事件分发器
 *
 * @package chaser\event
 */
class Dispatcher implements DispatcherInterface
{
    /**
     * 监听器列表
     *
     * @var array[] [...[事件类型, 事件回调, 优先级]]
     */
    protected array $listeners = [];

    /**
     * @inheritDoc
     */
    public function dispatch(object $event): object
    {
        $listeners = $this->getListenersForEvent($event);
        if ($this->stoppable($event)) {
            foreach ($listeners as $listener) {
                if ($event->isPropagationStopped()) {
                    break;
                }
                $listener($event);
            }
        } else {
            foreach ($listeners as $listener) {
                $listener($event);
            }
        }
        return $event;
    }

    /**
     * @inheritDoc
     *
     * @return SplPriorityQueue<callable>
     */
    public function getListenersForEvent(object $event): SplPriorityQueue
    {
        $queue = new SplPriorityQueue();
        foreach ($this->listeners as $listener) {
            if ($event instanceof $listener[0]) {
                $queue->insert($listener[1], $listener[2]);
            }
        }
        return $queue;
    }

    /**
     * @inheritDoc
     */
    public function addListener(string $event, callable $callback, int $priority = 1)
    {
        $this->listeners[] = [$event, $callback, $priority];
    }

    /**
     * 添加订阅者
     *
     * @param SubscriberInterface $subscriber
     * @param int $priority
     */
    public function addSubscriber(SubscriberInterface $subscriber, int $priority = 1)
    {
        foreach ($subscriber->events() as $event => $method) {
            $this->addListener($event, [$subscriber, $method], $priority);
        }
    }

    /**
     * @inheritDoc
     */
    public function clear()
    {
        $this->listeners = [];
    }

    /**
     * @inheritDoc
     */
    public function stoppable(object $event): bool
    {
        return $event instanceof StoppableEventInterface;
    }
}
