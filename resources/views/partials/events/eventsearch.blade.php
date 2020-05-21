<!-- search by text -->
<div id="home-search-container" class="container">
    
    <div class="md-form mt-0">
        <form action="{{ route('search') }}" method="GET" class="search-form">
           <!-- <input type="text" placeholder="Search" name="query" id="query" class="search-box"> -->
            <input name="query" id="query" class="form-control" type="text" aria-label="Search" placeholder="Search by title, date or description">
        </form> 
        <br>
        <form action="{{ route('searchLocation') }}" method="GET" class="search-form">
           <!-- <input type="text" placeholder="Search" name="query" id="query" class="search-box"> -->
            <input name="query" id="query" class="form-control" type="text" aria-label="Search" placeholder="Search by location">
        </form> 
        
    </div>


<!-- search by tags -->

    <br>
    <p id="search-by">Search by tag: </p>
    <div class="row mx-md-n6">
        <div class="col px-md-6">
            <button onclick="location.href='tags/theater';" id="tag-button" type="button" class="btn theater-tag">Theater</button>
        </div>
        
        <div class="col px-md-6">
            <button onclick="location.href='tags/sculpture';" id="tag-button" type="button" class="btn sculpture-tag">Sculpture</button> 
        </div>
        
        <div class="col px-md-6">
            <button onclick="location.href='tags/dance';" id="tag-button" type="button" class="btn dance-tag">Dance</button> 
        </div>
        
        <div class="col px-md-6">
            <button onclick="location.href='tags/music';" id="tag-button" type="button" class="btn music-tag">Music</button> 
        </div>
        
        <div class="col px-md-6">
            <button onclick="location.href='tags/painting';" id="tag-button" type="button" class="btn paintings-tag">Paintings</button> 
        </div>
        
        <div class="col px-md-6">
            <button onclick="location.href='tags/comedy';" id="tag-button" type="button" class="btn comedy-tag">Comedy</button> 
        </div>    
        
        <div class="col px-md-6">
            <button onclick="location.href='tags/literature';" id="tag-button" type="button" class="btn literature-tag">Literature</button> 
        </div>
        
        <div class="col px-md-6">
            <button onclick="location.href='tags/others';" id="tag-button" type="button" class="btn others-tag">Others</button> 
        </div>
        </div>
</div>