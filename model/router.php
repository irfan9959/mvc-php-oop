<?php
class Router extends Entity{
    protected $dbc;
    public function __construct($dbc)
    {
        $this->dbc=$dbc;
        $this->tableName='routes';
        $this->fields=[
            'id',
            'module',
            'action',
            'entity_id',
            'pretty_url',
        ];
    }

}