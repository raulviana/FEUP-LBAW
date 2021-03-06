<tr id="cell">
        <th scope="row">{{$event->id}}</th>
        <td>{{$event->title}}</td>
        <td><a href="/api/events/{{$event->id}}/posts/get" class="btn btn-info" role="button">Posts</a></td>
        <td>
            <button id="show-event-detail" class="btn btn-primary float-center" type="button" data-toggle="collapse" data-target="#{{$event->id}}" aria-expanded="false" aria-controls="collapseExample">
                Details
            </button>
            </p>
            <div class="collapse" id={{$event->id}}>
                <div class="card card-body">
                    <small>{{$event->details}}</small>
                </div>
            </div>
        </td>
        @if($event->is_active)
        <td id="changeable-element{{$event->id}}"> <button id="delete-event-btn" data-id={{$event->id}} type="button" class="btn btn-danger"> Delete </button> </td>
        <td id="active-status{{$event->id}}" data-id={{$event->id}}>Active</td>
        @else
        <td id="changeable-element{{$event->id}}"> <button id="restore-event-btn" data-id={{$event->id}} type="button" class="btn btn-success"> Restore </button> </td>
        <td id="deleted-status{{$event->id}}" data-id={{$event->id}}>Deleted</td>
        @endif
<tr>