<?php

namespace Unamatasanatarai\LaraSpy;

use Auth;
use Spy;

trait SpyTrait
{

    static $spyIgnoreColumns = [ 'created_at', 'updated_at', 'deleted_at' ];

    public static function bootSpyTrait()
    {
        static::updated(
            function ($model) {
                $data = $model->spyGetChangedFields();

                if ( ! empty($data)) {
                    Spy::log('updated', get_class($model), $model->id, $data, $model->spyGetUserId());
                }
            }
        );

        static::created(
            function ($model) {
                $data = $model->spyGetChangedFields();

                Spy::log('created', get_class($model), $model->id, $data, $model->spyGetUserId());
            }
        );

        static::deleted(
            function ($model) {
                Spy::log('deleted', get_class($model), $model->id, [], $model->spyGetUserId());
            }
        );

        if (method_exists(__CLASS__, 'restored')) {
            static::restored(
                function ($model) {
                    Spy::log('restored', get_class($model), $model->id, [], $model->spyGetUserId());
                }
            );
        }
    }

    public function spyGetChangedFields()
    {
        $toLog    = [];
        $original = $this->getOriginal();
        $dirty    = $this->getDirty();

        foreach ($dirty as $field => $value) {
            if (in_array($field, self::$spyIgnoreColumns) || in_array($field, $this->hidden)) {
                continue;
            }
            $toLog['new'][ $field ] = $this->{$field};
        }

        foreach ($original as $field => $value) {
            if (in_array($field, self::$spyIgnoreColumns) || in_array($field, $this->hidden)) {
                continue;
            }
            if (isset($toLog['new'][ $field ])) {
                $toLog['from'][ $field ] = $value;
            }
        }

        return $toLog;
    }

    public function spyGetUserId()
    {
        return Auth::check() ? Auth::user()->id : null;
    }
}
