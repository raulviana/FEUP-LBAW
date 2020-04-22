<tr>
<th scope="row">{{$user->id}}</th>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
@if(is_null($user->deleted_at))
    <td> <button data-id={{$user->id}} type="button" class="btn btn-danger"> Suspend </button> </td>
    <td data-id={{$user->id}}>Active</td>
@else 
    <td> <button data-id={{$user->id}} type="button" class="btn btn-success"> Activate </button> </td>
    <td data-id={{$user->id}}>Suspended</td>
@endif
<tr>