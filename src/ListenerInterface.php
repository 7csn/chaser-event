<?php

namespace chaser\event;

/**
 * 事件监听接口
 *
 * @package chaser\event
 */
interface ListenerInterface
{
    /**
     * 返回事件是否处于监听范围
     *
     * @param object $event
     * @return bool
     */
    public function contains(object $event): bool;

    /**
     * 监听响应
     *
     * @param object $event
     */
    public function __invoke(object $event): void;
}
