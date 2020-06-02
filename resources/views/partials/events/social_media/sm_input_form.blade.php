<div class="row">
    <div class="container">
        <div class="input-group">
            <div class="input-group-prepend">
                <span style="width: 6.5rem;" class="input-group-text">{{$sm_name}}</span>
            </div>
            @if(!empty($event) && count($event->socialmedia->where('name', 'like', $sm_name)) > 0)
                <input id="sm_link" type="text" class="form-control" placeholder="{{$sm_name}} URL" name="{{$sm_url}}" value={{$event->socialmedia->where('name', 'like', $sm_name)->first()->url}}>
            @else
                <input id="sm_link" type="text" class="form-control" placeholder="{{$sm_name}} URL" name="{{$sm_url}}">
            @endif
        </div>
    </div>
</div>