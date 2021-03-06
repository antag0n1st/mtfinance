<?php if (isset($member) and $member): /* @var $member Member */ ?>

<div style="height: 300px;">
        <form id="edit-member" name="form" method="post" action="<?php echo URL::abs('members/edit/'.$member->id); ?>">
            <div class="collum1 text">
            Име: <br/>
            Коментар: <br/>
            Адреса: <br/>
            ЕМБГ: <br/>
            Член од: <br/>
            Активен: <br/>
            Група: <br/>
            </div>
            <div class="collum2">
            <?php HTML::textfield('name', '', '', array(), false, $member->name); ?> 
            <?php HTML::textfield('comment', '', '', array(), false, $member->comment); ?> 
            <?php HTML::textfield('contact', '', '', array(), false, $member->contact); ?> 
            <?php HTML::textfield('address', '', '', array(), false, $member->address); ?> 
            <?php HTML::textfield('embg', '', '', array(), false, $member->embg); ?> <br/> 
            <?php echo TimeHelper::to_date($member->created_at, 'd M Y'); ?> 

            <input onchange="change_status('<?php echo $member->id; ?>');" type="checkbox" <?php echo $member->is_active ? 'checked="checked"' : ''; ?> />
            <?php HTML::select($groups, 'group_id', $member->group_id); ?> <br /><br />
            
            <input type="submit" value="Зачувај" /> <br/> <br/>
            </div>
        </form>
    </div>

    <br />
    <br />

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
                        <td class="td">  <?php echo TimeHelper::to_date($payment->created_at, 'd M Y H:m'); ?> </td>
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
    function change_status(id) {
        window.location = base_url + 'members/change-status/' + id;
    }

    $(function () {
        $("#group_id").change(function () {
            window.location = base_url + 'members/change-group/<?php echo $member->id; ?>/' + $("#group_id").val();
        });
    });
</script>
