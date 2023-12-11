<?php

namespace App\Observers;

use App\Models\TotalRice;
use App\Models\RiceDistribution;

class RiceDistributionObserver
{
    /**
     * Handle the RiceDistribution "created" event.
     */
    public function created(RiceDistribution $riceDistribution): void
    {
        //
    }

    /**
     * Handle the RiceDistribution "updated" event.
     */
    public function updated(RiceDistribution $riceDistribution): void
    {
        if ($riceDistribution->isDirty('quantity_distributed')) {
            $oldQuantity = $riceDistribution->getOriginal('quantity_distributed');
            $newQuantity = $riceDistribution->quantity_distributed;

            $difference = $newQuantity - $oldQuantity;

            TotalRice::first()->increment('total', $difference);
        }
    }

    /**
     * Handle the RiceDistribution "deleted" event.
     */
    public function deleted(RiceDistribution $riceDistribution): void
    {
        //
    }

    /**
     * Handle the RiceDistribution "restored" event.
     */
    public function restored(RiceDistribution $riceDistribution): void
    {
        //
    }

    /**
     * Handle the RiceDistribution "force deleted" event.
     */
    public function forceDeleted(RiceDistribution $riceDistribution): void
    {
        //
    }
}