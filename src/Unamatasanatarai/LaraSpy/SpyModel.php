<?php

namespace Unamatasanatarai\LaraSpy;

use Illuminate\Database\Eloquent\Model;

class SpyModel extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'spy';

    protected $guarded = [ 'id' ];
}
