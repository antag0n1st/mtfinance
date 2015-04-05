<?php

class Member extends Model {

    public static $table_name = 'members';
    public static $id_name = 'id';
    public static $db_fields = array('id', 'group_id', 'name', 'contact', 'address', 'embg', 'gender', 'is_active', 'created_at', 'is_deleted');
    public $id;
    public $group_id;
    public $name;
    public $contact;
    public $address;
    public $embg;
    public $gender;
    public $is_active;
    public $created_at;
    public $is_deleted;
    public $is_paid;
    public $due_days;
    public $last_payment;
    public $is_billed;

    public static function find_all() {
        $query = " SELECT * FROM " . static::$table_name . " WHERE is_deleted = 0 ORDER BY is_active DESC ";
        return static::find_by_sql($query);
    }

    public static function find_all_active() {
        $query = " SELECT * FROM " . static::$table_name . " ";
        $query .= " WHERE is_deleted = 0 AND is_active = 1 ";
        return static::find_by_sql($query);
    }

    public static function find_by_group_id($group_id = 0) {
        
        $query = " SELECT m.*, p.pa,DATE(p.pd) as last_payment , IF(NOW() BETWEEN p.pa AND p.pd,1,0) is_paid , datediff(NOW(),p.pd) as due_days , is_billed ";
        $query .= " FROM " . static::$table_name . " as m ";
        $query .= " LEFT JOIN (";
        $query .= "SELECT MAX(p.paid_at) as pa , MAX(p.paid_due) as pd , member_id, is_billed FROM payments as p GROUP BY member_id";
        $query .= ") as p ON m.id = p.member_id";
        
        $query .= " WHERE is_deleted = 0 ";
        $query .= " AND is_active = 1 ";
        $query .= " AND group_id = '".Model::db()->prep($group_id)."' ";
        
        $query .= " ORDER BY is_billed , is_paid ";
        
        return static::find_by_sql($query);
    }

}
