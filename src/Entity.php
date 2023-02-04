<?php
class Entity{
    protected $tableName;
    protected $fields;
    protected $dbc;
    public function FindBy($fieldName,$fieldValue){
        $query="SELECT * FROM ".$this->tableName. " WHERE " .$fieldName."='$fieldValue'";
        $result=mysqli_query($this->dbc,$query);
        $pageData=mysqli_fetch_assoc($result);
        $this->setValues($pageData);
    }
    public function setValues($values){
        foreach($this->fields as $fieldName){
            $this->$fieldName=$values[$fieldName];
        }
    }
}