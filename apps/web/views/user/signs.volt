<h4> Hi {{ user.name }} </h4>
<h4> Hi {{ user.open_id }} </h4>
<div>
    <p>Your sign records </p>
    <ol>
        {% for sign in signs %}
            <li>{{ sign.time }}</li>
        {% endfor %}
    </ol>

</div>
