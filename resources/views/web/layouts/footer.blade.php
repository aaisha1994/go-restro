<footer class="footer_short bg-white padding-t-5">
   <div class="container">
      <div class="row justify-content-md-center text-center">
         <div class="col-md-8">
            <a class="logo c-dark" href="mobile-app.html">
             <img src="{{asset('web/img/logos/logo.png')}}" alt="logo">
            </a>
            <div class="social--media">
               <a href="https://api.whatsapp.com/send?phone=918799599912&text=Hello" class="btn so-link">
                  <i class="tio whatsapp"></i>
               </a>
               <a href="#" class="btn so-link"><i class="tio instagram"></i></a>
               <a href="#" class="btn so-link"><i class="tio google"></i></a>
               <a href="#" class="btn so-link"><i class="tio linkedin"></i></a>
               <a href="#" class="btn so-link"><i class="tio facebook_square"></i></a>
            </div>
            <div class="other--links">
               <a href="{{route('terms-condition')}}">Terms & Condition</a>
               <a href="{{route('privacy-policy')}}">Privacy Policy</a>
               <a href="{{route('refund-cancellation')}}">Refund & Cancellation Policy </a>
            </div>
            <div class="opyright">
               <p>
                  © {{Date('Y')}} <a href="{{route('index')}}" target="_blank"> Go Restro. </a>All Right Reseved
               </p>
            </div>
         </div>
      </div>
   </div>
</footer>