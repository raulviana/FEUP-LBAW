<tr data-id={{$invite->id}}>
    <th scope="row">{{$invite['invited']->id}}</th>
    <td>{{$invite['invited']->name}}</td>
    <td>
        @if(is_null($invite['accepted']))
        Pending...
        @elseif($invite['accepted'])
        Accepted
        @else 
        Rejected
        @endif
    </td>    
    <td> <a data-id={{$invite->id}} id="remove-guest" class="nav-link">🗑️</a> </td>
</tr>
