<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERP Solution || Codecell Limited</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="background-color: #6F42C1">
        <div class="container py-2">
            <a class="navbar-brand" href="#">
                <h4 class="m-0">ERP Industry</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item me-3">
                        <a class="nav-link active" aria-current="page" href="#erp">Home</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#">Support</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- //.Navbar --}}

    {{-- main container --}}
    <div class="container">

        {{-- what is ERP? --}}
        <div class="row min-vh-100 align-items-center justify-content-between" id="erp">
            <div class="col-md">
                <h2 class="mb-4">What is ERP?</h2>

                <div>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio illum ducimus odio consequatur impedit, veritatis quidem voluptate cupiditate sequi molestias saepe consequuntur, necessitatibus iure suscipit cumque autem voluptatum accusantium provident, nobis atque ex sunt! Distinctio vero magnam minus ex voluptate dolor ad placeat porro voluptatibus dolores! Quae consectetur ipsam veniam repellendus quisquam, eum voluptatum, beatae saepe quas temporibus nam 
                </div>
            </div>
            <div class="col-md-5">
                <img src="{{ asset('html/erp-meaning.jpeg') }}" alt="erp-system" class="img-fluid">
            </div>
        </div>
        {{-- //. what is ERP? --}}

        {{-- why do you need ERP? --}}
         <div class="row min-vh-100 align-items-center justify-content-between" id="need_erp">
            <div class="col-md">
                <h2 class="mb-4">What is ERP?</h2>

                <div>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio illum ducimus odio consequatur impedit, veritatis quidem voluptate cupiditate sequi molestias saepe consequuntur, necessitatibus iure suscipit cumque autem voluptatum accusantium provident, nobis atque ex sunt! Distinctio vero magnam minus ex voluptate dolor ad placeat porro voluptatibus dolores! Quae consectetur ipsam veniam repellendus quisquam, eum voluptatum, beatae saepe quas temporibus nam 
                </div>
            </div>
            <div class="col-md-5">
                <img src="{{ asset('html/erp-meaning.jpeg') }}" alt="erp-system" class="img-fluid">
            </div>
        </div>
        {{-- //. why do you need ERP? --}}

        
    </div>
    {{-- //. main container --}}







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
