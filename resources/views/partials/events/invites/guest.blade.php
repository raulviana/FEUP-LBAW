@if($invite['accepted'] == true)
    <a href="/profile/{{$invite['invited']->id}}"><img src={{ Storage::url('users/'.$invite['invited']['photo']) }} class="rounded-circle mr-2" alt="Guest" width="50px"></a>
@endif