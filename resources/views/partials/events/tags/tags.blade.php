@if($tag->name == "Theater")
    <div class="col px-md-6">
        <button id="tag-button" class="btn theater-tag">Theater</button>
    </div>
@endif

@if($tag->name== "Sculpture")
    <div class="col px-md-6">
        <button id="tag-button" class="btn sculpture-tag">Sculpture</button> 
    </div>
@endif

@if($tag->name == "Dance")
    <div class="col px-md-6">
        <button id="tag-button" class="btn dance-tag">Dance</button> 
    </div>
@endif

@if($tag->name == "Music")
    <div class="col px-md-6">
        <button id="tag-button" class="btn music-tag">Music</button> 
    </div>
@endif

@if($tag->name == "Painting")
    <div class="col px-md-6">
        <button id="tag-button" class="btn paintings-tag">Paintings</button> 
    </div>
@endif

@if($tag->name == "Comedy")
    <div class="col px-md-6">
        <button id="tag-button" class="btn comedy-tag">Comedy</button> 
    </div>    
@endif

@if($tag->name == "Literature")
    <div class="col px-md-6">
        <button id="tag-button" class="btn literature-tag">Literature</button> 
    </div>
@endif

@if($tag->name == "Others")
    <div class="col px-md-6">
        <button id="tag-button" class="btn others-tag">Others</button> 
    </div>
@endif