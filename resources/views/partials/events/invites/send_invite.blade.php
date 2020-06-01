<div class="container">
    <small> Enter the email of the user to invite</small>  
    <form  data-id="{{$event->id}}">
        <input id="search-users-invite" type="text" placeholder="Search..." name="search">
        <button id="search-users-invite" type="submit" class="btn">+</button>
    </form>
          
    <table class="table table-striped" id="search-results-invite">          
        <tbody>  </tbody> <!-- tbody used in javascript !-->
    </table>

    <a id="change-invite-message" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        Click to change default invitation message ↓ ↓
    </a>

      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <textarea id="invite-message" class="form-control" rows="2" placeholder="Hello! I invite you to my event!"></textarea>
        </div>
      </div>

    <br>
            
</div>