<?php

namespace App\Listeners\Backend\Rates;

/**
 * Class RateEventListener.
 */
class RateEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Rate';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->rate->id)
            ->withText('trans("history.backend.rates.created") <strong>'.$event->page->rate.'</strong>')
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
            ->withEntity($event->rate->id)
            ->withText('trans("history.backend.rates.updated") <strong>'.$event->rate->title.'</strong>')
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
            ->withEntity($event->rate->id)
            ->withText('trans("history.backend.rates.deleted") <strong>'.$event->rate->title.'</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    /**
     * @param $event
     */
    public function onError($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->rate->id)
            ->withText('trans("history.backend.rates.error") <strong>'.$event->rate->title.'</strong>')
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
            \App\Events\Backend\Rates\RateCreated::class,
            'App\Listeners\Backend\Rates\RateEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Rates\RateUpdated::class,
            'App\Listeners\Backend\Rates\RateEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Rates\RateDeleted::class,
            'App\Listeners\Backend\Rates\RateEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Rates\RateError::class,
            'App\Listeners\Backend\Rates\RateEventListener@onError'
        );
    }
}
