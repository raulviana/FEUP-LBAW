<tr>
<th scope="row">{{$user->id}}</th>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
    @if($user->is_active)
        <td id="changeable-element{{$user->id}}"> <button id="delete-user-btn" data-id={{$user->id}} type="button" class="btn btn-danger"> Suspend </button> </td>
        <td id="active-status{{$user->id}}" data-id={{$user->id}}>Active</td>
    @else
        <td id="changeable-element{{$user->id}}"> <button id="restore-user-btn" data-id={{$user->id}} type="button" class="btn btn-success"> Restore </button> </td>
        <td id="deleted-status{{$user->id}}" data-id={{$user->id}}>Suspended</td>
    @endif
<tr>