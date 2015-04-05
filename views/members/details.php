<?php if (isset($member) and $member): /* @var $member Member */ ?>

    <div>
        <p><label>Име:</label> <b><?php echo $member->name; ?></b> </p>
        <p><label>Контакт:</label> <b><?php echo $member->contact; ?></b> </p>
        <p><label>Адреса:</label> <b><?php echo $member->address; ?></b> </p>
        <p><label>Ембг:</label> <b><?php echo $member->embg; ?></b> </p>
        <p><label>Член од:</label> <b><?php echo TimeHelper::to_date($member->created_at, 'd M Y'); ?></b> </p>
        
        <p><label>Активен:</label> <input onchange="change_status('<?php echo $member->id; ?>');" type="checkbox" <?php echo $member->is_active ? 'checked="checked"' : ''; ?> /> </p>
        <label>group: </label><?php HTML::select($groups, 'group_id',$member->group_id); ?> <br /><br />
    </div>

    <?php if (isset($payments) and $payments): ?>

        <table class="table">
            <colgroup>
                <col class="colid" />
            </colgroup>
            <thead>
                <tr id="title-line">
                    <th class="th"> Бр. </th>
                    <th class="th"> Платено од датум </th>
                    <th class="th"> До датум </th>
                    <th class="th"> Сума </th>
                    <th class="th hide"> Сметка </th>
                    <th class="th"> Наплатил </th>
                    <th class="th"> На датум </th>
                    <th class="th"> Избриши </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $key => $payment): /* @var $payment Payment */ ?>
                    <tr>
                        <td class="td">  <?php echo $payment->id; ?> </td>
                        <td class="td">  <?php echo TimeHelper::to_date($payment->paid_at, 'd M Y'); ?> </td>
                        <td class="td">  <?php echo TimeHelper::to_date($payment->paid_due, 'd M Y'); ?> </td>
                        <td class="td">  <?php echo $payment->payment_sum; ?> </td>
                        <td class="td hide">  <?php echo $payment->is_billed ? 'Да' : 'Не'; ?> </td>
                        <td class="td">  <?php echo $payment->username; ?> </td>
                        <td class="td">  <?php echo TimeHelper::to_date($payment->created_at, 'd M Y h:m'); ?> </td>
                        <td class="td">  
                            <?php if ($payment->is_new): ?>                    
                                <a class="confirm" href="<?php echo URL::abs('training/delete-payment/' . $payment->id); ?>">Избриши</a> 
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>

    <div>
        <br /><br />
    </div>

<?php endif; ?>

<script type="text/javascript">
    function change_status(id){
        window.location = base_url + 'members/change-status/'+id;
    }
    
    $(function(){
        $("#group_id").change(function(){
            window.location = base_url + 'members/change-group/<?php echo $member->id; ?>/'+$("#group_id").val();
        });
    });
</script>
