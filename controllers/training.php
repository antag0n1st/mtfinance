<?php

class TrainingController extends Controller {

    public function __construct() {
        parent::__construct();

        Head::instance()->load_css('jquery-ui');
        Head::instance()->load_js('jquery-ui.min');
    }

    public function main() {
        $this->men();
    }

    public function men($group_id = 1) {

        global $view, $_active_page_, $_active_page_submenu_;
        $_active_page_ = "men";
        $_active_page_submenu_ = $group_id;
        $view = 'training';

        Load::model('member');
        Load::model('group');
        Load::assign('group_id', $group_id);
        
        $group = Group::find_by_id($group_id);
        Load::assign('group', $group);

        $members = Member::find_by_group_id($group_id);
        Load::assign('members', $members);
    }

    public function women($group_id = 5) {

        $this->men($group_id);

        global $view, $_active_page_, $_active_page_submenu_;
        $_active_page_ = "women";
        $_active_page_submenu_ = $group_id;
    }

    public function individual($group_id = 0) {
        $this->men($group_id);

        global $view, $_active_page_, $_active_page_submenu_;
        $_active_page_ = "individual";
        $_active_page_submenu_ = $group_id;
    }

    public function pay() {

        Load::model('payment');

        $payment = new Payment();
        $payment->member_id = $this->get_post('member_id');
        $payment->payment_sum = $this->get_post('payment');
        $payment->user_id = Membership::instance()->user->id;
        $payment->is_billed = $this->get_post('is_billed') ? 1 : 0;
        $payment->paid_at = date("Y-m-d", strtotime($this->get_post('date')));
        $payment->paid_due = date("Y-m-d", strtotime("+1 month", strtotime($this->get_post('date'))));
        $payment->created_at = TimeHelper::DateTimeAdjusted();

        $payment->save();
        
        URL::redirect_to_refferer();
    }
    
   

}
