<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    /**
     * Get the plan associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function plan(): HasOne
    {
        return $this->hasOne(Subscription::class, 'id', 'subscription_id')->withDefault([
            'name' => 'Free Plan',
        ]);
    }

    /**
     * The questions that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class, 'user_question')->withPivot(['test_at','detail_id'])->orderByPivot('test_at', 'desc');
    }

    public function todatTest($user_id)
    {
        return \Illuminate\Support\Facades\DB::select(
            'select
                test_id,
                user_id
            from
                `questions`
            inner join `user_question` on
                `questions`.`id` = `user_question`.`question_id`
            where
                `user_question`.`user_id` = ?
                and date(`user_question`.`test_at`) = ?
            group by
                `test_id`,
                `user_id`
            order by
                `user_question`.`test_at` desc',
            [$user_id,today()]
        );
    }
}
