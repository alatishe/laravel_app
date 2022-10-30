<?php

namespace App\Listeners\Backend\Carriers;

/**
 * Class CarrierEventListener.
 */
class CarrierEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Carrier';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->carrier->id)
            ->withText('trans("history.backend.carriers.created") <strong>'.$event->page->carrier.'</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->carrier->id)
            ->withText('trans("history.backend.carriers.updated") <strong>'.$event->carrier->title.'</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->carrier->id)
            ->withText('trans("history.backend.carriers.deleted") <strong>'.$event->carrier->title.'</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Carriers\CarrierCreated::class,
            'App\Listeners\Backend\Carriers\CarrierEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Carriers\CarrierUpdated::class,
            'App\Listeners\Backend\Carriers\CarrierEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Carriers\CarrierDeleted::class,
            'App\Listeners\Backend\Carriers\CarrierEventListener@onDeleted'
        );
    }
}
