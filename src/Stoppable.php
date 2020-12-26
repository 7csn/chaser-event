<?php

declare(strict_types=1);

namespace chaser\event;

/**
 * 可停止传播
 *
 * @package chaser\event
 */
trait Stoppable
{
    /**
     * 事件是否停止传播
     *
     * @var bool
     */
    protected bool $isPropagationStopped = false;

    /**
     * @inheritDoc
     */
    public function isPropagationStopped(): bool
    {
        return $this->isPropagationStopped;
    }

    /**
     * @inheritDoc
     */
    public function stopPropagation(): void
    {
        $this->isPropagationStopped = true;
    }
}
