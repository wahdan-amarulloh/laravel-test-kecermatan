<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    /**
     * Get all of the detail for the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail(): HasMany
    {
        return $this->hasMany(QuestionDetail::class);
    }

    /**
     * The users that belong to the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_question');
    }

    /**
     * The groups that belong to the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }
}
