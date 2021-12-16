<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    /**
     * The model's fillable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'question',
        'answer',
        'score',
    ];

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
