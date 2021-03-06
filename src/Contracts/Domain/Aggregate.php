<?php namespace C4tech\RayEmitter\Contracts\Domain;

use C4tech\RayEmitter\Contracts\Event\Collection as EventCollection;

interface Aggregate
{
    /**
     * Apply
     *
     * Central method to distribute events to an internal handler which alters
     * the Aggregate Root's state.
     * @param  EventInterface $event   An event that has occurred.
     * @return void
     */
    public function apply(Event $event);

    /**
     * Get Entity
     *
     * Return the read-only root Entity of the Aggregate.
     * @return Entity
     */
    public function getEntity();

    /**
     * Get Id
     *
     * Return the identifier Value Object.
     * @return ValueObjectInterface
     */
    public function getId();

    /**
     * Get Sequence
     *
     * Return the current version sequence number.
     * @return int Current version sequence.
     */
    public function getSequence();

    /**
     * Handle
     *
     * Central method to distribute command to an internal handler.
     * @param  CommandInterface    $command A command to execute.
     * @return EventInterface|void $event   An event that has occurred.
     */
    public function handle(Command $command);

    /**
     * Hydrate
     *
     * Restore the Aggregate Root's state by applying an events stack.
     * @param  EventCollection $events A collection of events.
     * @return void
     */
    public function hydrate(EventCollection $events);
}
