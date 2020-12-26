<?php

declare(strict_types=1);

namespace chaser\event;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;

/**
 * 事件调度器
 *
 * @package chaser\event
 */
interface DispatcherInterface extends EventDispatcherInterface, ListenerProviderInterface
{
    /**
     * 添加事件侦听
     *
     * @param string $event
     * @param callable $callback
     * @param int $priority
     * @return mixed
     */
    public function addListener(string $event, callable $callback, int $priority = 1);

    /**
     * 清空侦听器
     */
    public function clear();

    /**
     * 事件是否可停止传播
     *
     * @param object $event
     * @return bool
     */
    public function stoppable(object $event): bool;
}
