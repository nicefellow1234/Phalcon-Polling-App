<?php $auth = $this->session->get("auth"); ?>
<br>
<?php if ($auth): ?>
<div class="alert alert-info">
	Welcome <?php echo $auth["username"]; ?> <span class="pull-right">{{ link_to('poll/logout/',"class":"btn btn-danger","style":"margin-top: -7px", "Logout") }}</span>
</div><?php else: ?>
<div class="alert alert-info">
	Please login for changes <span class="pull-right">{{ link_to('poll/login/',"class":"btn btn-success","style":"margin-top: -7px", "Login") }}</span>
</div><?php endif; ?>

<style type="text/css">
a {margin:5px;}
</style>

<h1>Polls</h1>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Poll Question</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	{% for poll in polls %}
		<tr>
			<td>{{ poll.question }}</td>
			<td>{{ link_to('poll/showoption/' ~ poll.id,"class":"btn btn-default btn-sm", "View") }} <?php if ($auth): ?> {{ link_to('poll/editpoll/' ~ poll.id,"class":"btn btn-primary btn-sm", "Edit") }} {{ link_to('poll/deletepoll/' ~ poll.id,"class":"btn btn-danger btn-sm", "Delete") }} <?php endif; ?></td>
		</tr>
	{% endfor %}
	</tbody>
</table>
<?php if ($auth): ?>
<br>
{{ link_to('poll/addpoll/',"class":"btn btn-default", "Add New Poll") }} 
<?php endif; ?>