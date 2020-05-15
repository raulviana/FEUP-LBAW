@if($social_media->name == "Facebook")
    <a href="{{$social_media->url}}" class="fa fa-facebook"></a>
@elseif($social_media->name == "Twitter")
    <a href="{{$social_media->url}}" class="fa fa-twitter"></a>
@elseif($social_media->name == "Youtube")
    <a href="{{$social_media->url}}" class="fa fa-youtube"></a>
@elseif($social_media->name == "Instagram")
    <a href="{{$social_media->url}}" class="fa fa-instagram"></a>
@else
    <a href="{{$social_media->url}}" class="fa fa-google"></a>
@endif
