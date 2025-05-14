<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        //вызывается при создании нового постав
        echo 'create: '.$post->id.'<br>';
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        //вызывается при обновлении нового постав
        echo 'updated: '.$post->id.'<br>';
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //вызывается при удалении нового постав
        echo 'deleted: '.$post->id.'<br>';
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //вызывается при восстановлении после удаления нового постав
        echo 'restored: '.$post->id.'<br>';
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //вызывается при полном удалении нового постав
        echo 'forceDeleted: '.$post->id.'<br>';
    }
}
