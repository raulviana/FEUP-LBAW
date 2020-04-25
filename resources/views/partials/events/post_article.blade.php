<article class="post p-3 mb-3">
    <div class="d-flex flex-row align-items-center">
        <img src="https://pbs.twimg.com/profile_images/973548356462051329/PldBA7ID_400x400.jpg" class="rounded-circle mr-2" alt="Owner" width="50px">
        <h6> <b>{{$post->user_id['name']}}</b> says... </h6>
    </div>
    <p id="comment-body">{{$post->content}}</p>
    <p id="comment-datetime" class="text-right">{{$post->post_time}}</p>
</article>
<hr>
                                