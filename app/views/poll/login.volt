<br>
<?php echo $this->getContent(); ?>
<br>
<div class="col-lg-6 col-lg-offset-3">
<div class="panel panel-default">
<div class="panel-body">
  <h2>Login Form</h2>{{ form('session/start',"class":"form-horizontal") }}
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-10">
      {{ text_field('username',"class":"form-control","placeholder":"Enter username") }}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-10">
      {{ password_field('password',"class":"form-control","placeholder":"Enter password") }}
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      {{ submit_button('Login',"class":"btn btn-default") }} {{ link_to('poll/',"class":"btn btn-default", "Visit Polls Just!") }}
    </div>
  </div>{{ endForm() }}
  </div>
  </div>
</div>