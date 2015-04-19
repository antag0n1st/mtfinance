
<table class="table">
    <colgroup>
        <col class="colid" />
    </colgroup>
    <thead>
        <tr id="title-line">
            <th class="th"> Бр. </th>
            <th class="th"> Име </th>
            <th class="th"> Време </th>
            <th class="th"> Индивидуална </th>
            <th class="th"> Активна </th>
            <th class="th"> Бр. Членови </th>
            <th class="th"> Избриши </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($groups as $key => $group): /* @var $group Group */ ?>
            <tr>
                <td class="td">  <?php echo $group->id; ?> </td>
                <td class="td">  <?php echo $group->name; ?> </td>
                <td class="td">  <?php echo $group->time; ?> </td>
                <td class="td">  <?php echo $group->is_individual ? "Да" : "Не"; ?>  </td>
                <td class="td"> 
                    <?php if($group->is_active): ?>
                        <a href="<?php echo URL::abs('groups/deactivate/'.$group->id); ?>">Да</a>
                    <?php else: ?>
                        <a href="<?php echo URL::abs('groups/activate/'.$group->id); ?>">Не</a>
                    <?php endif; ?>                    
                </td>
                <td class="td">  <?php echo $group->size; ?> </td>
                <td class="td">  
                    <?php if($group->id > 7): ?>
                    <a href="<?php echo URL::abs('groups/delete/'.$group->id); ?>" class="confirm">
                        Избриши
                    </a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div>
    <a href="<?php echo URL::abs('groups/add'); ?>" class="link">
        <img  class="add add-hover" src="images/add.png"  
              alt="Додади" title="додади нов" />
    </a> 
</div>