<?php
namespace Unamatasanatarai\LaraSpy;

use Eloquent;

class SpyModel extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'spy';

    protected $guarded = [ 'id' ];
}
