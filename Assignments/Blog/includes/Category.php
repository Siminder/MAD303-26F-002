<?php
class Category{
    private $id;
    private $cat;

    public function __construct($id, $cat){
        $this->id = $id;
        $this->cat = $cat;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Category
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCat()
    {
        return $this->cat;
    }

    /**
     * @param mixed $cat
     * @return Category
     */
    public function setCat($cat)
    {
        $this->cat = $cat;
        return $this;
    }




    public static function all(){}
    public static function find($sql, $bindVal = null)
    {
        global $dbc;

        $categories = $dbc->fetchArray($sql, $bindVal);

        if ($categories === false) {
            return [];
        }

        $categoryObjArray = [];

        foreach ($categories as $category) {
            $categoryObjArray[] = new self(
                $category['cat_id'],
                $category['cat']
            );
        }

        return $categoryObjArray;
    }

    public function create()
    {
        global $dbc;

        $sql = "INSERT INTO categories (cat) VALUES (:cat)";

        $bindVal = [
            ':cat' => $this->cat
        ];

        return $dbc->sqlQuery($sql, $bindVal);
    }
}
?>