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

}
