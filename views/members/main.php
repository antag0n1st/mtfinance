
<table class="table">
    <colgroup>
        <col class="colid" />
    </colgroup>
    <thead>
        <tr id="title-line">
            <th class="th"> Бр. </th>
            <th class="th"> Име </th>
            <th class="th"> Контакт </th>
            <th class="th"> Адреса </th>
            <th class="th"> Активен </th>
            <th class="th hide"> Детали </th>
            <th class="th"> Избриши </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($members as $key => $member): /* @var $member Member */ ?>
            <tr>
                <td class="td">  <?php echo $member->id; ?> </td>
                <td class="td">  <?php echo $member->name; ?> </td>
                <td class="td">  <?php echo $member->contact; ?> </td>
                <td class="td">  <?php echo $member->address; ?> </td>
                <td class="td">  <?php echo $member->is_active ? "Да" : "Не"; ?> </td>
                <td class="td hide"> <a href="<?php echo URL::abs('members/details/' . $member->id); ?>"> Детали </a> </td>
                <td class="td">  
                    <a class="confirm" href="<?php echo URL::abs('members/delete/' . $member->id); ?>">
                        Избриши
                    </a> 
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div>
    <a href="<?php echo URL::abs('members/add'); ?>" class="link">
        <img  class="add add-hover" src="images/add.png"  
              alt="Додади" title="додади нов" />
    </a> 
</div>
