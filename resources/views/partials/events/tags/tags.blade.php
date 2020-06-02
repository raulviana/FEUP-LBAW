@if($tag == "Theater")
    <div class="col px-md-6">
        <button onclick="location.href='/tags/theater';" id="tag-button" class="btn theater-tag">Theater</button>
    </div>
@endif

@if($tag== "Sculpture")
    <div class="col px-md-6">
        <button onclick="location.href='/tags/sculpture';"  id="tag-button" class="btn sculpture-tag">Sculpture</button> 
    </div>
@endif

@if($tag == "Dance")
    <div class="col px-md-6">
        <button  onclick="location.href='/tags/dance';" id="tag-button" class="btn dance-tag">Dance</button> 
    </div>
@endif

@if($tag == "Music")
    <div class="col px-md-6">
        <button  onclick="location.href='/tags/music';" id="tag-button" class="btn music-tag">Music</button> 
    </div>
@endif

@if($tag == "Painting")
    <div class="col px-md-6">
        <button  onclick="location.href='/tags/painting';" id="tag-button" class="btn paintings-tag">Paintings</button> 
    </div>
@endif

@if($tag == "Comedy")
    <div class="col px-md-6">
        <button  onclick="location.href='/tags/comedy';" id="tag-button" class="btn comedy-tag">Comedy</button> 
    </div>    
@endif

@if($tag == "Literature")
    <div class="col px-md-6">
        <button onclick="location.href='/tags/literature';"  id="tag-button" class="btn literature-tag">Literature</button> 
    </div>
@endif

@if($tag == "Others")
    <div class="col px-md-6">
        <button onclick="location.href='/tags/others';"  id="tag-button" class="btn others-tag">Others</button> 
    </div>
@endif