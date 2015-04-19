<form id="add-member" name="form" method="post" action="<?php echo URL::abs('members/add'); ?>">

    <label>name: </label> <?php HTML::textfield('name'); ?> <br /><br />
    <label>comment: </label> <?php HTML::textfield('comment'); ?> <br /><br />
    <label>contact: </label> <?php HTML::textfield('contact'); ?> <br /><br />
    <label>address: </label> <?php HTML::textfield('address'); ?> <br /><br />
    <label>embg: </label> <?php HTML::textfield('embg'); ?> <br /><br />
    <label for="is_female">is female? </label> <?php HTML::checkbox('is_female'); ?> <br /><br />
    <label for="is_male">is male? </label> <?php HTML::checkbox('is_male'); ?> <br /><br />
    <label>group: </label><?php HTML::select($groups, 'group_id',$group_id); ?> <br /><br />
    <label>is active: </label> <?php HTML::checkbox('is_active', "", "yes", "", array(), false, true); ?> <br /><br />

    <input type="submit" value="save" /> <br /> <br />
</form>