<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Str;

class NewsObserver
{
    /**
     * Handle the News "created" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function created(News $news)
    {
        $news->slug = Str::slug($news->title);
    }

    /**
     * Handle the News "updated" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function updated(News $news)
    {
        //
    }

    /**
     * Handle the News "deleted" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function deleted(News $news)
    {
        //
    }

    /**
     * Handle the News "restored" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function restored(News $news)
    {
        //
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function forceDeleted(News $news)
    {
        //
    }
}
