<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PushSubscription extends Model
{
    protected $fillable = [
        'user_id',
        'endpoint',
        'public_key',
        'auth_token',
        'content_encoding',
    ];

    public function __construct(array $attributes = [])
    {
        if (!isset($this->connection)) {
            $this->setConnection(config('webpush.database_connection'));
        }

        if (!isset($this->table)) {
            $this->setTable(config('webpush.table_name'));
        }

        parent::__construct($attributes);
    }

    public function subscribable()
    {
        return $this->morphTo();
    }

    public static function findByEndpoint($endpoint)
    {
        return static::where('endpoint', $endpoint)->first();
    }
}
