<?php

class GroupsController extends Controller {

    public function main() {

        Load::model('group');

        $groups = Group::find_all();

        Load::assign('groups', $groups);
    }

    public function add() {

        if (isset($_POST) and $_POST) {
            Load::model('group');
            
            $group = new Group();

            $group->comment = $this->get_post('comment');
            $group->is_active = $this->get_post('is_active') ? 1 : 0;
            $group->is_individual = $this->get_post('is_individual') ? 1 : 0;
            $group->size = $this->get_post('size');
            $group->name = $this->get_post('name');
            $group->time = $this->get_post('time');
            $group->created_at = TimeHelper::DateTimeAdjusted();

            $group->save();

            URL::redirect('groups');
        }
    }

    public function delete($id) {
        Load::model('group');
        $group = Group::find_by_id($id);
        /* @var $group Group */
        $group->is_deleted = 1;
        
        $group->save();
        URL::redirect_to_refferer();
    }
    
    public function comment(){
        global $layout;
        $layout = null;
                
        Load::model('group');
        
        if(isset($_POST) and $_POST){
            $group_id = $this->get_post('group_id');
            
            /* @var $group Group */
            $group = Group::find_by_id($group_id);
            $group->comment = $this->get_post('comment');
            $group->save();
        }
        
        
    }

}
