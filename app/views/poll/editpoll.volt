<div class="container">
  <h2>Edit Poll</h2>
  <form class="form-horizontal" method="post" action="{{ url('poll/updatepoll') }}">
  	{{ hidden_field("id","value": poll.id ) }}
    <div class="form-group">
      <label class="control-label col-sm-2" for="question">Question:</label>
      <div class="col-sm-10">
        {{ text_field('question',"class":"form-control","value": poll.question) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Save',"class":"btn btn-default") }} {{ link_to('poll/',"class":"btn btn-default", "Cancel") }}
      </div>
    </div>
  </form>
</div>
