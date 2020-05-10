<tr id="cell{{$post->id}}">
    
    <th scope="row">{{$post->id}}</th>
    <td>{{$post->content}}</td>
    <td>
        {{$post->post_time}}
    </td>
    <td>
        {{$post->user_id}}
    </td>
    <td> <button id="delete-post-btn" data-id={{$post->id}} type="button" class="btn btn-danger float-right"> Delete </button> </td>

<tr>