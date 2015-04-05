<?php

class Payment extends Model {

    public static $table_name = 'payments';
    public static $id_name = 'id';
    public static $db_fields = array('id', 'paid_at', 'paid_due', 'is_billed', 'payment_sum', 'member_id', 'user_id', 'created_at');
    public $id;
    public $paid_at;
    public $paid_due;
    public $is_billed;
    public $payment_sum;
    public $member_id;
    public $user_id;
    public $created_at;
    public $username;
    public $is_new;

    public static function find_all_by_member($id) {
        $query = " SELECT p.* , u.username , ";
        $query .= " IF(p.created_at >= (NOW() - INTERVAL 10 MINUTE),1,0) as is_new ";
        $query .= " FROM payments as p ";
        $query .= " JOIN users as u ON p.user_id = u.user_id ";
        $query .= " WHERE member_id = '".Model::db()->prep($id)."'";
        return Payment::find_by_sql($query);
    }
}
