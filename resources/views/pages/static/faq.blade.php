 @extends('layouts.app')

 @section('title', 'Artnow - FAQ')
   
@section('content')

<div class="container">
    <br><br><br><br>
    <h1>FAQ</h1>
    <br>

    <div class="accordion" id="FAQ">
        <!--1-->
        <div class="card">
            <div class="card-header" id="HOne">
                <h2 class="mb-0">
                    <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="false" aria-controls="collapseOne">
                        What's the purpose of Art Now?
                    </button>
                </h2>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" aria-labelledby="HOne"
                data-parent="#FAQ">
                <div class="card-body">
                ArtNow is a web platform where you can advertise your art event. Music festivals, band gigs, painting exhibitions, reading meetings. Small, medium, huge. It's art? We will help you spread the word. 
                </div>
            </div>
        </div>
        <!--2-->
        <div class="card">
            <div class="card-header" id="HTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        What can I use Art Now for?
                    </button>
                </h2>
            </div>

            <div id="collapseTwo" class="panel-collapse collapse in" aria-labelledby="HTwo"
                data-parent="#FAQ">
                <div class="card-body">
                ArtNow can be used to either organize a small event with your friends, sending invitations to who you would like to show up, or advertize a big event publicly, to the whole world.
                </div>
            </div>
        </div>
        <!--3-->
        <div class="card">
            <div class="card-header" id="HThree">
                <h2 class="mb-0">
                    <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">
                        How can I search for events?
                    </button>
                </h2>
            </div>

            <div id="collapseThree" class="panel-collapse collapse in" aria-labelledby="HThree"
                data-parent="#FAQ">
                <div class="card-body">
                You can search for events in the general search, by keywords, or you can use the buttons with the corresponding tag: theater, sculpture, dance, music, paintings, comedy, literature, others.
                </div>
            </div>
        </div>
        <!--4-->
        <div class="card">
            <div class="card-header" id="HFour">
                <h2 class="mb-0">
                    <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseFour"
                        aria-expanded="false" aria-controls="collapseFour">
                        How can I advertise my event on Art Now?
                    </button>
                </h2>
            </div>

            <div id="collapseFour" class="panel-collapse collapse in" aria-labelledby="HFour"
                data-parent="#FAQ">
                <div class="card-body">
                Just create an event, fill in the forms with its information, and start sending invites. You can invite sponsors, partners and users. 
                </div>
            </div>
        </div>

         <!--5-->
         <div class="card">
            <div class="card-header" id="HFive">
                <h2 class="mb-0">
                    <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseFive"
                        aria-expanded="false" aria-controls="collapseThree">
                        What's the difference between public and private events?
                    </button>
                </h2>
            </div>

            <div id="collapseFive" class="panel-collapse collapse in" aria-labelledby="HFive"
                data-parent="#FAQ">
                <div class="card-body">
                The public events can be seen by everyone while private events are only accessible to whom the owner has invited. Public events are destined to advertize big, massive art events, while private events are destined to organize small scale more controllable ones. </div>
            </div>
        </div>
    </div>
</div>
    
@endsection