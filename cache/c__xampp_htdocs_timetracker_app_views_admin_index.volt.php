<?= $this->getContent() ?>
admin timer management

<div class="container-fluid">
    <h2>Users</h2>
    <table class="table">
      <thead>
        <tr>
           <?php $workDays = array(); ?>
          <th scope="col">Name</th>
          <?php $today = strtotime('now'); ?>
          <?php while(intval(date('j', $today)) != 1): ?>
            <th scope="col" class="workers_date"><?php echo date('d m Y', $today); ?></th>
            <?php $workDays[date('Y-m-d', $today)] = date('Y-m-d', $today); ?>
            <?php $today = strtotime(date('Y-m-d',$today) ."-1 day"); ?>
          <?php endwhile; ?>
        </tr>
      </thead>
      <tbody>
          <?php foreach ($allUsers as $user) { ?>
              <tr>
                <th>
                    <div class="user_name">
                    <?= $this->escaper->escapeHtml($user['name']) ?>
                    </div>
                </th>
                    <?php foreach ($workDays as $day) { ?>
                        <?php $hasDay = false; ?>
                        <?php foreach ($statistics as $single) { ?>
                            <?php if ($single['user_id'] == $user['id'] && $single['date'] == $day) { ?>
                                <?php $hasDay = true; ?>
                                <td class="workers_time">
                                    <input type="time" name="work_begins" value="<?= $single['work_begins'] ?>" >
                                    <br>
                                    <input type="time" name="work_ends" value="<?= $single['work_ends'] ?>" >
                                </td>
                                <?php break; ?>
                            <?php } ?>
                        <?php } ?>
                        <?php if (!$hasDay) { ?>
                            <td class="workers_time">&nbsp;</td>
                        <?php } ?>
                    <?php } ?>
              </tr>
          <?php } ?>

      </tbody>
    </table>
</div>