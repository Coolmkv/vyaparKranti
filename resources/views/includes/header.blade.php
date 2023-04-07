<header class="top-header">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container-fluid bg-light">
            <a class="navbar-brand" href="{{ url("/") }}">
                <img src="{{asset("assets/img/logo_3d.png")}}" style="height: 75px;" alt="image">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                <ul class="navbar-nav">
                    <li><a class="nav-link active" href="{{ url("/") }}">Home</a></li>
                    <li><a class="nav-link" href="{{ route("aboutUs") }}">About Us</a></li>
                    <li><a class="nav-link" href="{{ route("ourServices") }}">Services</a></li>
                    <li><a class="nav-link" href="{{ route("ourPortfolio") }}">Library</a></li>
                    <li><a class="nav-link" href="{{ route("contactUs") }}">Contact us</a></li>
                </ul>
            </div>
            <div class="search-box invisible" >
                <input type="text" class="search-txt" placeholder="Search">
                <a class="search-btn">
                    <img src="{{ asset("assets/images/search_icon.png")}}" alt="#" />
                </a>
            </div>
        </div>
    </nav>
</header>