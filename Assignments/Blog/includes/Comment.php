<?php
class Comment{
    private $id;
    private $entry_id;
    private $date;
    private $name;
    private $comment;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    public function getEntryId()
    {
        return $this->entry_id;
    }

    public function setEntryId($entry_id)
    {
        $this->entry_id = $entry_id;
        return $this;
    }


    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    public function __construct($id, $entry_id, $date, $name, $comment){
        $this->id = $id;
        $this->entry_id = $entry_id;
        $this->date = $date;
        $this->name = $name;
        $this->comment = $comment;

    }

    public static function find($sql, $bindVal = nulL){
        global $dbc;
        $comments = $dbc->fetchArray($sql, $bindVal);
        if(!$comments){
            return [];
        }

        foreach($comments as $comment){
            $commentObjArray[] = new self([$comment['id']],
            $comment['entry_id'],
            $comment['date'],
            $comment['name'],
            $comment['comment']);

        }

        return $commentObjArray;
    }
    public function create(){
        global $dbc;
        $sql = "INSERT INTO `comments` (entry_id, date, name, comment)" .
            " VALUES (:entry_id, NOW(), :name, :comment);";
        $bindVal = ['entry_id' => $this->entry_id,
                    'name' => $this->name,
                    'comment' => $this->comment];
        return $dbc->sqlQuery($sql, $bindVal);

    }

}
?>