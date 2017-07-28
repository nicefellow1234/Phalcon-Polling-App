<div class="container">
  <h2>Add New Option</h2>
  <form class="form-horizontal" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="question">Name:</label>
      <div class="col-sm-10">
        {{ text_field('name',"class":"form-control","placeholder":"Enter your Poll Option") }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Add',"class":"btn btn-default") }} {{ link_to('poll/',"class":"btn btn-default", "Cancel") }}
      </div>
    </div>
  </form>
</div>
