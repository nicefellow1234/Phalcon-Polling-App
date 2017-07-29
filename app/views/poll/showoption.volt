<?php $auth = $this->session->get("auth"); ?>
<br>
<?php if ($auth): ?>
<div class="alert alert-info">
	Welcome <?php echo $auth["username"]; ?> <span class="pull-right">{{ link_to('poll/logout/' ~ poll.id,"class":"btn btn-danger","style":"margin-top: -7px", "Logout") }}</span>
</div><?php else: ?>
<div class="alert alert-info">
	Please login for changes <span class="pull-right">{{ link_to('poll/login/',"class":"btn btn-success","style":"margin-top: -7px", "Login") }}</span>
</div><?php endif; ?>

<style type="text/css">
a {margin:5px;}
</style>

{{ flash.output() }}

<h1>{{ poll.question }}</h1>
<div class="col-sm-8">
	<table class="table table-bordered">
		<tbody>
		{% for option in options %}
			<tr>
				<td>{{ option.name }}</td>
				<td>{{ option.number_votes }}</td>
				<td>{{ link_to('poll/voteoption/' ~ option.id,"class":"btn btn-default", "Vote Up") }}</td><?php if ($auth):?>
				<td>{{ link_to('poll/editoption/' ~ option.id,"class":"btn btn-primary", "Edit") }} {{ link_to('poll/deleteoption/' ~ option.id,"class":"btn btn-danger", "Delete") }}</td><?php endif; ?>
			</tr>
		{% endfor %}
		</tbody>
	</table>
	<br>
	<p>
<?php if ($auth): ?>
	{{ link_to('poll/addoption/' ~ poll.id,"class":"btn btn-default", "Add New Option") }} &nbsp; 
<?php endif; ?>
	{{ link_to('poll/',"class":"btn btn-default", "Go Back!") }}</p>
</div>