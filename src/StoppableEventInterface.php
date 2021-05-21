<?php

declare(strict_types=1);

namespace chaser\event;

use Psr\EventDispatcher\StoppableEventInterface as PsrStoppableEventInterface;

/**
 * 可停止传播事件
 *
 * @package chaser\event
 */
interface StoppableEventInterface extends PsrStoppableEventInterface
{
    /**
     * 事件停止传播
     */
    public function stopPropagation(): void;
}
