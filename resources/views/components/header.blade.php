 <header class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
     <div class="container">
         <a class="navbar-brand" href="{{ route('landing') }}">ClassRoom</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
             aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class=" collapse navbar-collapse" id="navbarNavDropdown">
             <ul class="navbar-nav ms-auto ">
                 @auth
                     <li class="nav-item">
                         <a href="/dashboard" class="nav-link mx-2 active">dashboard</a>
                     </li>
                 @else
                     <li class="nav-item">
                         <a class="nav-link mx-2 active" aria-current="page" href="{{ route('landing') }}">Home</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link mx-2" href="{{ route('login') }}">Login</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link mx-2" href="{{ route('register') }}">Register</a>
                     </li>
                 @endauth
             </ul>
         </div>
     </div>
 </header>
