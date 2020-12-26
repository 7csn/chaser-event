<?php

declare(strict_types=1);

namespace chaser\event;

/**
 * 订阅者
 *
 * @package chaser\event
 */
interface SubscriberInterface
{
    /**
     * 订阅事件库
     *
     * @return string[]
     */
    public function events(): array;
}
