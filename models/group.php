<?php

class Group extends Model {

    public static $table_name = 'groups';
    public static $id_name = 'id';
    public static $db_fields = array('id', 'name', 'time', 'size', 'is_individual', 'comment', 'is_active', 'created_at', 'is_deleted');
    public $id;
    public $name;
    public $time;
    public $size;
    public $is_individual;
    public $comment;
    public $is_active;
    public $created_at;
    public $is_deleted;

    public static function find_all() {
        $query = " SELECT * FROM groups WHERE is_deleted = 0 ";
        return Group::find_by_sql($query);
    }

    public static function find_all_active() {
        $query = " SELECT * FROM groups ";
        $query .= " WHERE is_deleted = 0 AND is_active = 1 ";
        return Group::find_by_sql($query);
    }

}
