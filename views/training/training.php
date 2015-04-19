<?php if (isset($members) and count($members) > 0): ?>

    <div style="margin-bottom: 20px;">
        <textarea id="group_comment" style="width: 90%; height: 50px;"><?php /* @var $group Group */ echo $group->comment; ?></textarea>
    </div>

    <table class="table">
        <colgroup>
            <col class="colid" />
        </colgroup>
        <thead>
            <tr id="title-line">
                <th class="th"> Бр. </th>
                <th class="th"> Име </th>
                <th class="th"> Коментар </th>
                <th class="th"> Контакт </th>
                <th class="th"> Адреса </th>
                <th class="th"> Активен </th>
                <th class="th"> Ден.Доцнење </th>
                <th class="th hide"> Детали </th>
                <th class="th"> Плати </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $key => $member): /* @var $member Member */ ?>
                <tr class="<?php 
                echo $member->due_days < 0 ? "" : "not-paid"; 
                echo $member->is_billed == 0 && $member->is_billed != null ? " hide" : ""; 
                ?>">
                    <td class="td">  <?php echo $member->id; ?> </td>
                    <td class="td">  <?php echo $member->name; ?> </td>
                    <td class="td">  <?php echo $member->comment; ?> </td>
                    <td class="td">  <?php echo $member->contact; ?> </td>
                    <td class="td">  <?php echo $member->address; ?> </td>
                    <td class="td">  <?php echo $member->is_active ? "Да" : "Не"; ?> </td>
                    <td class="td">  <?php echo abs($member->due_days); ?> </td>
                    <td class="td hide"> <a href="<?php echo URL::abs('members/details/'.$member->id); ?>"> Детали </a> </td>
                    <td class="td">  
                        <a href="#" class="link">
                            <img onclick="show_payment('<?php echo $member->id; ?>', '<?php echo $member->last_payment; ?>' , '<?php echo $member->name; ?>');"  
                                 class="uplata uplata-hover" 
                                 src="<?php echo URL::image('uplata.png'); ?>"  
                                 alt="Измени" title="измени" />
                        </a> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<br />
<div class="hide">
    Број на членови: <strong><?php echo count($members); ?></strong>
</div>

<?php endif; ?>

<div>
    <a href="<?php echo URL::abs('members/add/' . $group_id); ?>" class="link">
        <img  class="add add-hover" src="<?php echo URL::image('add.png'); ?>"  
              alt="Додади" title="додади нов" />
    </a> 
</div>

<form id="make-payment" style="display: none;" name="form" method="post" action="<?php echo URL::abs('training/pay'); ?>">
    <div id="payment_background" style="width: 100%;height: 100%;background-color: rgba(1,1,1,0.7);position: fixed;left: 0;top: 0;">
        <div id="payment_container" style="position: fixed;left: 35%;top:30%; background-color: white; border: 1px solid black; padding: 20px;">
            
            <input style="position: absolute; right: 10px;" type="button" value="close" onclick="hide_payment();" />
            <input type="hidden" name="member_id" id="member_id" />

            <input type="radio" name="payment" id="payment_1" value="1500" checked="checked" /> <label for="payment_1">1500 </label> <br /><br />
            <input type="radio" name="payment" id="payment_2" value="6000" /> <label for="payment_2">6000 </label> <br /><br />
            <input type="radio" name="payment" id="payment_3" value="0" /> <label for="payment_3">0 </label> <br /><br />
            <input type="radio" name="payment" id="payment_4" value="" /> <input type="text" id="custom_payment" /> <br /><br />
            <label>Платено од датум:</label><input type="text" id="start-date-datepicker" name="date" /> <br /><br />
            <div class="hide">
                 <label for="is_billed">Сметка</label><input name="is_billed" id="is_billed" checked="checked" type="checkbox" /> <br /><br />
            </div>
           <label id="member_name"></label> <input type="submit" value="Плати" />

        </div>
    </div>
</form>

<script type="text/javascript">
    $(function () {
        $("#custom_payment").keyup(function () {
            $("#payment_4").prop('checked', true);
            $("#payment_4").val($("#custom_payment").val());
        });

        $("#payment_background").click(function () {
            hide_payment();
        });

        $("#payment_container").click(function (event) {
            event.stopPropagation();
        });

        create_picker_by_id('start-date-datepicker');

        $(document).keyup(function (e) {

            if (e.keyCode == 27) {
                $("#make-payment").hide();
            }   // escape key maps to keycode `27`
        });

        $("#group_comment").keyup(function () {

            var comment = $("#group_comment").val();
            $.post("<?php echo URL::abs('groups/comment'); ?>",
                    {group_id: "<?php echo $group->id; ?>", comment: comment},
            function (data) {
                console.log(data);
            });

        });

    });

    function hide_payment() {
        $("#make-payment").hide();
    }

    function show_payment(member_id, date , name) {
        $("#member_id").val(member_id);
        var last_date_format = $("#start-date-datepicker").datepicker('option', 'dateFormat');
        $("#start-date-datepicker").datepicker('option', 'dateFormat', 'yy-mm-dd');
        $("#member_name").html(name);
        $("#start-date-datepicker").datepicker('setDate', date.length ? date : new Date());
        $("#start-date-datepicker").datepicker('option', 'dateFormat', last_date_format);
        $("#make-payment").show();
    }
</script>