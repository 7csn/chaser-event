<?php

namespace chaser\event;

/**
 * 事件监听类
 *
 * @package chaser\event
 */
class Listener implements ListenerInterface
{
    /**
     * 监听事件类型
     *
     * @var string
     */
    private string $event;

    /**
     * 监听事件回调
     *
     * @var callable
     */
    private $callback;

    /**
     * 初始化事件监听信息
     *
     * @param string $event
     * @param callable $callback
     */
    public function __construct(string $event, callable $callback)
    {
        $this->event = $event;
        $this->callback = $callback;
    }

    /**
     * @inheritDoc
     */
    public function contains(object $event): bool
    {
        return $event instanceof $this->event;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(object $event): void
    {
        if ($this->contains($event)) {
            ($this->callback)($event);
        }
    }
}
