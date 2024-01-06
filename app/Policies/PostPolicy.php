<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
   
     */
    public function delete(User $user, Post $post)
    {
     return $user->id===$post->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
 

    /**
     * Determine whether the user can permanently delete the model.
     */
   
}
