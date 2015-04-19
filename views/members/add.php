<div style="height: 350px;">
<form id="add-member" name="form" method="post" action="<?php echo URL::abs('members/add'); ?>">
    <div class="collum1 text">
        name: <br/>
        comment: <br/>
        contact: <br/>
        address: <br/>
        EMBG: <br/>
        is femile? <br/>
        is male? <br/>
        group: <br/>
        is active:<br/>
        </div>
    <div class="collum2">
     <?php HTML::textfield('name'); ?> 
    <?php HTML::textfield('comment'); ?> 
    <?php HTML::textfield('contact'); ?> 
    <?php HTML::textfield('address'); ?> 
    <?php HTML::textfield('embg'); ?> <br />
    <?php HTML::checkbox('is_female'); ?> <br />
    <?php HTML::checkbox('is_male'); ?> <br />
    <?php HTML::select($groups, 'group_id',$group_id); ?> <br />
    <?php HTML::checkbox('is_active', "", "yes", "", array(), false, true); ?> <br />

    <input type="submit" value="Save" style="cursor: pointer" /> <br />
    </div>
</form>
    
    </div>