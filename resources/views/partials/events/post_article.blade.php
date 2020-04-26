<article class="post p-3 mb-3">
    <div style="margin-bottom: 1.5rem;" class="d-flex flex-row align-items-center">
        <img src="https://pbs.twimg.com/profile_images/973548356462051329/PldBA7ID_400x400.jpg" class="rounded-circle mr-2" alt="Owner" width="50px">
        
            @if(is_null($post['writer']['name']))
                <h6> <b> SUSPENDED USER </b> says <h6>
            @else 
                <h6> <b> {{$post['writer']['name']}} </b> says... </h6>
            @endif 

    </div>
    <p id="comment-body">{{$post->content}}</p>
    <p id="comment-datetime" class="text-right">{{$post->post_time}}</p>
</article>
<hr>
                                