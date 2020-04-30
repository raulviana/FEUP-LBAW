<tr>
<th scope="row">{{$user->id}}</th>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
    @if($user->is_active)
        <td> <button id="delete-user-btn" data-id={{$user->id}} type="button" class="btn btn-danger"> Suspend </button> </td>
        <td data-id={{$user->id}}>Active</td>
    @else
        <td> <button id="restore-user-btn" data-id={{$user->id}} type="button" class="btn btn-success"> Restore </button> </td>
        <td data-id={{$user->id}}>Suspended</td>
    @endif
<tr>