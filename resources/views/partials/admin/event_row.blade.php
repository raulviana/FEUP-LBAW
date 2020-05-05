<tr>
    <th scope="row">{{$event->id}}</th>
    <td>{{$event->local['name']}}</td>
    <td>{{$event->start_date}}</td>
    <td>
        <button id="show-event-detail" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#{{$event->id}}" aria-expanded="false" aria-controls="collapseExample">
            Details
        </button>
        </p>
        <div class="collapse" id={{$event->id}}>
            <div class="card card-body">
                {{$event->details}}
            </div>
        </div>


    </td>
    /* @if($event->is_active)
    <td> <button id="delete-user-btn" data-id={{$event->id}} type="button" class="btn btn-danger"> Suspend </button> </td>
    <td data-id={{$event->id}}>Active</td>
    @else
    <td> <button id="restore-user-btn" data-id={{$event->id}} type="button" class="btn btn-success"> Restore </button> </td>
    <td data-id={{$user->id}}>Suspended</td>
    @endif */
<tr>