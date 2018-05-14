<?= $this->getContent() ?>
admin timer management

<div class="container-fluid">
    <h2>Users</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <?php foreach ($workDays as $day) { ?>
          <th scope="col"><?= $this->escaper->escapeHtml($day) ?></th>
          <?php } ?>
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
                    <?php foreach ($statistics as $single) { ?>
                        <?php if ($day == $single['date'] && $single['user_id'] == $user['id']) { ?>
                            <td>
                                <input type="time" name="work_begins" value="<?= $single['work_begins'] ?>" >
                                <input type="time" name="work_ends" value="<?= $single['work_ends'] ?>" >
                                <input type="text" name="date" value="<?= $single['date'] ?>" >
                            </td>
                        <?php } else { ?>
                            <td>&nbsp;</td>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
              </tr>
          <?php } ?>

      </tbody>
    </table>
</div>