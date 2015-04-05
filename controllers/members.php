<?php

class MembersController extends Controller {

    public function main() {
        Load::model('member');
        $members = Member::find_all();
        Load::assign('members', $members);
    }

    public function add($group_id = null) {
        Load::model('group');
        $groups = Group::find_all_active();

        $gr = array();

        foreach ($groups as $key => $group) { /* @var $group Group */
            $v = $group->name . " | " . $group->time . " | ";
            $v .= $group->is_individual ? "Индивидуална" : "Регуларна Група";
            $gr[$group->id] = $v;
        }

        Load::assign('groups', $gr);
        Load::assign('group_id', $group_id);

        if (isset($_POST) and $_POST) {

            Load::model('member');

            $member = new Member();
            $member->name = $this->get_post('name');
            $member->contact = $this->get_post('contact');
            $member->embg = $this->get_post('embg');
            $member->gender = $this->get_post('is_male') ? 'male' : 'female';
            $member->group_id = $this->get_post('group_id');
            $member->is_active = $this->get_post('is_active') ? 1 : 0;
            $member->created_at = TimeHelper::DateTimeAdjusted();
            $member->address = $this->get_post('address');

            $member->save();
            URL::redirect('members');
        }
    }

    public function delete($id) {
        Load::model('member');
        $member = Member::find_by_id($id);
        /* @var $member Member */
        $member->is_deleted = 1;
        $member->save();
        URL::redirect_to_refferer();
    }
    
    public function details($id=0){
        Load::model('member');
        Load::model('payment');
        Load::model('group');
        
        $groups = Group::find_all_active();

        $gr = array();

        foreach ($groups as $key => $group) { /* @var $group Group */
            $v = $group->name . " | " . $group->time . " | ";
            $v .= $group->is_individual ? "Индивидуална" : "Регуларна Група";
            $gr[$group->id] = $v;
        }

        Load::assign('groups', $gr);
        
        $member = Member::find_by_id($id);
        Load::assign('member', $member);
        
        $payments = Payment::find_all_by_member($member->id);
        Load::assign('payments', $payments);
        
    }
    
    public function change_status($id = 0){
        
        Load::model('member');
        
        /* @var $member Member */
        $member = Member::find_by_id($id);
        $member->is_active = $member->is_active ? 0 : 1 ;
        $member->save();
        
        URL::redirect_to_refferer();
    }
    
    public function change_group($id=0,$group_id = 0){
        
        Load::model('member');
        
        /* @var $member Member */
        $member = Member::find_by_id($id);
        $member->group_id = $group_id;
        $member->save();
        
        URL::redirect_to_refferer();
    }

}
