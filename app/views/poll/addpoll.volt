<div class="container">
  <h2>Add New Poll</h2>
  <form class="form-horizontal" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="question">Question:</label>
      <div class="col-sm-10">
        {{ text_field('question',"class":"form-control","placeholder":"Enter your Poll Question") }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Add',"class":"btn btn-default") }} {{ link_to('poll/',"class":"btn btn-default", "Cancel") }}
      </div>
    </div>
  </form>
</div>