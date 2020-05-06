<tr id="event{{$event->id}}">
    <div id='cell'>
        <th scope="row">{{$event->id}}</th>
        <td>{{$event->title}}</td>
        <td>{{$event->start_date}}</td>
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
        <td> <button id="delete-event-btn" data-id={{$event->id}} type="button" class="btn btn-danger"> Suspend </button> </td>
        <td data-id={{$event->id}}>Active</td>
        @else
        <td> <button id="restore-event-btn" data-id={{$event->id}} type="button" class="btn btn-success"> Restore </button> </td>
        <td>Deleted</td>
        @endif
    </div>
<tr>