<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="layout.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!-- Including bootstrap js -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!--       HEADER      -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top vertical-center">
            <div class="d-flex flex-grow-1">
                <h1 class="navbar-brand" id="event_title"><b>Queen Concert</b></h1>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse flex-grow-1 text-right" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto ml-auto flex-nowrap">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Buy Ticket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Wishlist</a>
                    </li>
                    <!-- for artist that haven't confirmed presence -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Confirm Presence</a>
                    </li>
                    <!-- for artist that have already confirmed presence -->
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#">Cancel Presence</a>
                    </li>-->
                    <!-- only for collaborators and owner -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Edit</a>
                    </li>
                    <!-- only for owner -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cancel</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- image -->
        <img src="https://www.clarionlbv.com/wp-content/uploads/2014/11/CLBV-Central-Florida-Events-Main-Img.jpg" alt="event_name" class="img-fluid">


        <nav>
            <div class="nav nav-tabs nav-fill w-100" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="true">Info</a>
                <a class="nav-item nav-link" id="nav-posts-tab" data-toggle="tab" href="#nav-posts" role="tab" aria-controls="nav-posts" aria-selected="false">Posts</a>
                <a class="nav-item nav-link" id="nav-related-tab" data-toggle="tab" href="#nav-related" role="tab" aria-controls="nav-related" aria-selected="false">Related</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                <!-- description -->
                <p id="event_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis dui augue, ut condimentum ante interdum nec. Donec sed magna dolor. Ut consequat pharetra blandit. Etiam convallis eu nisi et rutrum. Suspendisse placerat augue nec rutrum commodo. Mauris vestibulum nisi vel odio pretium, quis vestibulum tellus pellentesque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                <div id="event_sm">
                    <a class="btn btn-dark" href="#" role="button">Website</a>
                    <a class="btn btn-dark" href="#" role="button">Facebook</a>
                    <a class="btn btn-dark" href="#" role="button">Instagram</a>
                </div>
                <!-- location -->
                <h4><a href="https://www.google.com/maps/search/?api=1&query=altice+arena" class="event_location">Altice Arena, Lisbon</a></h3>
                <!-- dates -->
                <h6>12-12-2020 20:30 GMT - 12-12-2020 23h30 GMT</h6>
                <!-- tags -->
                <a id="event_tag" class="btn btn-info" href="#" role="button">Music</a>
                <a id="event_tag" class="btn btn-info" href="#" role="button">Concert</a>
                <a id="event_tag" class="btn btn-info" href="#" role="button">Other tag</a>
            </div>
            <div class="tab-pane fade" id="nav-posts" role="tabpanel" aria-labelledby="nav-posts-tab">...</div>
            <div class="tab-pane fade" id="nav-related" role="tabpanel" aria-labelledby="nav-related-tab">...</div>
        </div>
        <!--     FOOTER     -->
    </body>
</html> 