{{ content() }}
admin timer management

<div class="container-fluid">
    <h2>Users</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          {% for day in workDays %}
          <th scope="col">{{ day|e }}</th>
          {% endfor %}
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
                    {% for single in statistics %}
                        {% if day == single['date'] %}
                            {% single['user_id'] == user['id'] %}
                            <td>
                                <input type="time" name="work_begins" value="{{ single['work_begins'] }}" >
                                <input type="time" name="work_ends" value="{{ single['work_ends'] }}" >
                                <input type="text" name="date" value="{{ single['date'] }}" >
                            </td>
                        {% else %}
                            <td>&nbsp;</td>
                        {% endif %}
                    {% endfor %}
                {% endfor %}
              </tr>
          {% endfor %}

      </tbody>
    </table>
</div>