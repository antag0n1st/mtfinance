<div style="height: 300px; ">
<form id="add-group" name="form" method="post" action="<?php echo URL::abs('groups/add'); ?>">

    <div class="collum1 text">
        name: <br/>
        size: <br/>
        time: <br/>
        is individual: <br/>
        is active: <br/>
    </div>
    <div class="collum2">
    <?php HTML::textfield('name', ''); ?> 
    <?php HTML::textfield('size'); ?> 
    <?php HTML::textfield('time'); ?> <br/>
    <?php HTML::checkbox('is_individual'); ?> <br />
    <?php HTML::checkbox('is_active', "", "yes", "", array(), false, true); ?> <br />
    <?php HTML::textarea('comment'); ?> <br />
    <input type="submit" value="Save" style="cursor: pointer;"/> <br /> <br />
    </div>
</form>
    </div>