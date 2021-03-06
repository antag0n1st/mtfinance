<?php global $_active_page_, $_active_page_submenu_; ?>
<div class="container">
    <div id="top-menu">
        <div id="menu-wraper">
            <div> <a href="<?php echo URL::abs('training/men'); ?>" class="menu-list <?php HTML::is_active('men'); ?>"> Мажи </a> </div>
            <div> <a href="<?php echo URL::abs('training/women'); ?>" class="menu-list <?php HTML::is_active('women'); ?>"> Жени </a> </div>
            <div class="hide"> <a href="<?php echo URL::abs('training/individual'); ?>" class="menu-list <?php HTML::is_active('individual'); ?>"> Приватни часови </a> </div>

            <div class="hide"> <a href="<?php echo URL::abs('members'); ?>" class="menu-list <?php HTML::is_active('members'); ?>"> <img src="<?php echo URL::image('members.png'); ?>" />  </a> </div>
            <div class="hide"> <a href="<?php echo URL::abs('groups'); ?>" class="menu-list <?php HTML::is_active('groups'); ?>"> <img src="<?php echo URL::image('groups.png'); ?>" /> </a> </div>
        </div>
    </div>
</div>
<div class="submenu"> 

    <?php if (HTML::is_active('men', '', true) == 'active'): ?>

        <div> <a href="<?php echo URL::abs('training/men/1'); ?>" class="submenu-list <?php HTML::is_active('men', '1'); ?>"> 18:00 </a> </div>
        <div> <a href="<?php echo URL::abs('training/men/2'); ?>" class="submenu-list <?php HTML::is_active('men', '2'); ?>"> 19:00 </a> </div>
        <div> <a href="<?php echo URL::abs('training/men/3'); ?>" class="submenu-list <?php HTML::is_active('men', '3'); ?>"> 20:00 </a> </div>
        <div> <a href="<?php echo URL::abs('training/men/4'); ?>" class="submenu-list <?php HTML::is_active('men', '4'); ?>"> 21:00 </a> </div>

    <?php endif; ?>


    <?php if (HTML::is_active('women', '', true) == 'active'): ?>

        <div> <a href="<?php echo URL::abs('training/women/5'); ?>" class="submenu-list <?php HTML::is_active('women', '5'); ?>"> 18:00 </a> </div>
        <div> <a href="<?php echo URL::abs('training/women/6'); ?>" class="submenu-list <?php HTML::is_active('women', '6'); ?>"> 19:00 </a> </div>
        <div> <a href="<?php echo URL::abs('training/women/7'); ?>" class="submenu-list <?php HTML::is_active('women', '7'); ?>"> 20:00 </a> </div>

    <?php endif; ?>


    <?php if (HTML::is_active('individual', '', true) == 'active' and isset($individual_groups)): ?>
        
        <?php foreach($individual_groups as $key => $group): /* @var $group Group */ ?>
        <div> <a href="<?php echo URL::abs('training/individual/'.$group->id); ?>" class="submenu-list <?php HTML::is_active('individual', $group->id); ?>"> <?php echo $group->name." ".$group->time; ?> </a> </div>
        <?php endforeach; ?>
        
    <?php endif; ?>



</div>