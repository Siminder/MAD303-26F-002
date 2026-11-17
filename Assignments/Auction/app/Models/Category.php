<?php

namespace App\Models;

use App\Lib\Helper;

/**
 * Class Category
 * @package App\Models
 */
class Category {
    use Helper;

    protected static $table_name = "categories";

    protected $id = 0;
    protected $cat;

    /**
     * Category constructor.
     * @param $cat
     */
    public function __construct($cat) {
        $this->cat = $cat;
    }

} //End of Category Class
