<?php

namespace App;

use GetStream\StreamLaravel\Eloquent\ActivityTrait;
use Illuminate\Database\Eloquent\Model;

class Dweet extends Model
{
    use ActivityTrait;

    public $fillable = ['user_id', 'text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function stream($stream)
    {
        return self::find(explode(':',$stream)[1]);
    }

    public function getTextAttribute($value)
    {
        return nl2br($value);
    }
}
