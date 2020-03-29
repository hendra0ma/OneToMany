<?php

namespace App\Observers;

use App\Column;
use App\Task;

class ColumnObserver
{
    /**
     * Handle the column "created" event.
     *
     * @param  \App\Column  $column
     * @return void
     */
    public function created(Column $column)
    {
        //
    }

    /**
     * Handle the column "updated" event.
     *
     * @param  \App\Column  $column
     * @return void
     */
    public function updated(Column $column)
    {
        //
    }

    /**
     * Handle the column "deleted" event.
     *
     * @param  \App\Column  $column
     * @return void
     */
    public function deleted(Column $column)
    {
        
    }
    public function deleting(Column $column)
    {
        
    }

    /**
     * Handle the column "restored" event.
     *
     * @param  \App\Column  $column
     * @return void
     */
    public function restored(Column $column)
    {
        //
    }

    /**
     * Handle the column "force deleted" event.
     *
     * @param  \App\Column  $column
     * @return void
     */
    public function forceDeleted(Column $column)
    {
        //
    }
}
