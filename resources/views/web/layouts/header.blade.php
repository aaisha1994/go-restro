<header class="header-nav-center active-blue" id="myNavbar">
   <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light px-sm-0">
         <a class="navbar-brand" href="{{route('index')}}">
           <img class="logo" src="{{asset('web/img/logos/logo.png')}}" alt="logo" />
         </a>
         <button class="navbar-toggler menu ripplemenu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <svg viewBox="0 0 64 48">
               <path d="M19,15 L45,15 C70,15 58,-2 49.0177126,7 L19,37"></path>
               <path d="M19,24 L45,24 C61.2371586,24 57,49 41,33 L32,24"></path>
               <path d="M45,33 L19,33 C-8,33 6,-2 22,14 L45,37"></path>
            </svg>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mx-auto nav-pills">
                 <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('index') }}#services">Why Go Restro</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('index') }}#FAQ">FAQ</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('contact-us') ? 'active' : '' }}" href="{{ route('contact-us') }}">Contact us</a>
                 </li>
              </ul>
            <div class="nav_account btn_demo3">
               <a href="{{route('add.restaurant')}}" class="btn btn_sm_primary effect-letter text-primary rounded-8">Add Restro</a>
               <a href="{{route('affiliate.login')}}" class="btn btn_sm_primary text-primary effect-letter rounded-8">Affiliate Login</a>
            </div>
         </div>
      </nav>
   </div>
</header>
 <script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.hash) {
            const targetElement = document.querySelector(window.location.hash);
            if (targetElement) {
                setTimeout(() => {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }, 100); // Adjust delay if necessary
            }
        }

        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(event) {
                if (this.hash) {
                    event.preventDefault();
                    const targetElement = document.querySelector(this.hash);
                    if (targetElement) {
                        window.history.pushState(null, null, this.hash);
                        targetElement.scrollIntoView({ behavior: 'smooth' });
                    } else {
                        window.location.href = this.href; // For links to other pages
                    }
                }
            });
        });
    });
</script>
