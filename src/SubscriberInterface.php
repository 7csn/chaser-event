<?php

declare(strict_types=1);

namespace chaser\event;

/**
 * 事件订阅接口
 *
 * @package chaser\event
 */
interface SubscriberInterface
{
    /**
     * 事件监听列表
     *
     * @return ListenerInterface[]
     */
    public function listeners(): array;
}
