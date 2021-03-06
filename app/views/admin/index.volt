{{ content() }}
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
          {% for user in allUsers %}
              <tr>
                <th>
                    <div class="user_name">
                    {{ user['name']|e }}
                    </div>
                </th>
                    {% for day in workDays %}
                        {% set hasDay = false %}
                        {% for single in statistics %}
                            {% if single['user_id'] == user['id'] and single['date'] == day %}
                                {% set hasDay = true %}
                                <td class="workers_time">
                                    <input type="time" name="work_begins" value="{{ single['work_begins'] }}" >
                                    <br>
                                    <input type="time" name="work_ends" value="{{ single['work_ends'] }}" >
                                </td>
                                {% break %}
                            {% endif %}
                        {% endfor %}
                        {% if not hasDay %}
                            <td class="workers_time">&nbsp;</td>
                        {% endif %}
                    {% endfor %}
              </tr>
          {% endfor %}

      </tbody>
    </table>
</div>