@include('partials.events.eventsearch')

<main id="event-list">
    <div class="album py-5 bg-light" >
        <div class="container">
            <div class="row">
            
                @if(count ($events) > 0)
                    @each('partials.events.eventcard', $events, 'event')
                @endif
               
                

            </div>
        </div>
    </div>
</main>
