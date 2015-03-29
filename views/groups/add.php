 <form id="add-group" name="form" method="post" action="<?php echo URL::abs('groups/add'); ?>">
     
     <label>name: </label> <?php HTML::textfield('name'); ?> <br /><br />
     <label>size: </label> <?php HTML::textfield('size'); ?> <br /><br />
     <label>time: </label> <?php HTML::textfield('time'); ?> <br /><br />
     <label>is individual: </label> <?php HTML::checkbox('is_individual'); ?> <br /><br />
     <label>is active: </label> <?php HTML::checkbox('is_active', "", "yes", "", array(), false, true); ?> <br /><br />
     <label>comment: </label> <?php HTML::textarea('comment'); ?> <br /><br />
     <input type="submit" value="save" /> <br /> <br />
 </form>