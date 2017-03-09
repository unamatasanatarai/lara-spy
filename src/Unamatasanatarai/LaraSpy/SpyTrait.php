<?php

namespace Unamatasanatarai\LaraSpy;

use Auth;
use Spy;

trait SpyTrait
{

    static $spyIgnoreColumns = [ 'created_at', 'updated_at', 'deleted_at' ];


    public static function bootSpyTrait()
    {
        static::updated(function ($model) {
            $toLog = $model->spyGetChangedFields();

            if ( ! empty($toLog) ) {
                Spy::log(sprintf('Updated %s[%s]', get_class($model), $model->id), $toLog, $model->spyGetUserId());
            }
        });

        static::created(function ($model) {
            $toLog = $model->spyGetChangedFields();

            Spy::log(sprintf('Created %s[%s]', get_class($model), $model->id), $toLog, $model->spyGetUserId());
        });

        static::deleted(function ($model) {
            Spy::log(sprintf('Deleted %s[%s]', get_class($model), $model->id), [], $model->spyGetUserId());
        });

        if ( method_exists(__CLASS__, 'restored') ) {
            static::restored(function ($model) {
                Spy::log(sprintf('Restored %s[%s]', get_class($model), $model->id), [], $model->spyGetUserId());
            });
        }
    }


    public function spyGetChangedFields()
    {
        $toLog = [];
        $dirty = $this->getDirty();

        foreach ($dirty as $field => $value) {
            if ( in_array($field, self::$spyIgnoreColumns) ) {
                continue;
            }
            $toLog[$field] = in_array($field, $this->hidden)
                ? '_hidden_'
                : $this->{$field};
        }

        return $toLog;
    }


    public function spyGetUserId()
    {
        return Auth::check()
            ? Auth::user()->id
            : null;
    }
}
