<tr id="cell{{$event->id}}">
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
        <td> <button id="delete-event-btn" data-id={{$event->id}} type="button" class="btn btn-danger"> Delete </button> </td>
        <td id="status-info" data-id={{$event->id}}>Active</td>
        @else
        <td> <button id="restore-event-btn" data-id={{$event->id}} type="button" class="btn btn-success"> Restore </button> </td>
        <td id="status-info" data-id={{$event->id}}>Deleted</td>
        @endif
<tr>