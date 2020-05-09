<div class="containter" id="new-post">

    <form> 
        {{ csrf_field() }}
    
        <div class="form-group">
            <textarea id="post-content" class="form-control" rows="3" name="content" placeholder="Write your post..."></textarea>      
        </div>
        
        <div class="form-group row">
             <label class="col-lg-3 col-form-label form-control-label"></label>
             <div class="col-lg-9">
                <button data-event-id={{$event->id}} data-user-id={{Auth::user()->id}} type="submit" class="btn float-right" id="btn-add-post">POST</button>                                                               
            </div>
        </div>
        
    </form>

</div>
