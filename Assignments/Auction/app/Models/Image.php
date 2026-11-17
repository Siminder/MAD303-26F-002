<?php

namespace App\Models;

use App\Lib\Helper;

/**
 * Class Image
 * @package App\Models
 */
class Image {
    use Helper;

    protected static $table_name = "images";

    protected $id = 0;
    protected $item_id;
    protected $name;

    /**
     * Image constructor.
     * @param $item_id
     * @param $name
     */
    public function __construct($item_id, $name) {
        $this->item_id = $item_id;
        $this->name = $name;
    }

} //End of Image Class
