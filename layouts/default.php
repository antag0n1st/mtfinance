<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
      xmlns:og="http://opengraphprotocol.org/schema/"
      xmlns:fb="http://www.facebook.com/2008/fbml"
      >
    <head>
        <?php Head::instance()->display(); ?>
    </head>
    <body>  

        <?php Load::view('elements/error'); ?>

        <div> 
            <a href="<?php echo URL::abs(''); ?>">
                <img src="<?php echo URL::image('logo.png'); ?>" alt="Logo MojTrener" title="Мој Тренер Наплата" />
            </a>            
        </div>

        <div class="background"> 

            <?php if (Membership::instance()->user->user_level > 0) : ?>                
                <p class="loggedin-name"> Hi, <?php echo Membership::instance()->user->full_name; ?> </p>

                <form id="sign-out-form" name="form" method="post" action="<?php echo URL::abs('membership/logout'); ?>">
                    <a href="#" class="signout" onclick="document.getElementById('sign-out-form').submit();" > Sign out </a>
                </form>
            <?php else: ?>

            <?php endif; ?>


            <?php if (Membership::instance()->user->user_level < 4): ?>

            <?php else: ?>

                <?php Load::view('elements/menu'); ?>

            <?php endif; ?>

            <div class="table-wraper">
                <?php Controller::load_main_view(); ?> 
            </div>


        </div>

        <?php
        if (HOST_ID != 0) {
            Load::app('debug');
        }
        ?>


    </body>
</html>

