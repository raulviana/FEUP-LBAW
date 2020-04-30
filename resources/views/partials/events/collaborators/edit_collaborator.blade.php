<tr data-id={{$user->id}}>
    <th scope="row">{{$user->id}}</th>
    <td>{{$user->name}}</td>
    <td>
    <a data-id={{$user->id}} id="remove-collaborator" class="nav-link">🗑️</a> 
    </td>
</tr>
