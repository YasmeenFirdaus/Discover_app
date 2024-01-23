<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS</title>
    <!-- CDN link-->
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=DM+Sans:ital,opsz,wght@0,9..40,600;1,9..40,300&family=Inter:wght@700&family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
     
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
 
    <!-- OWN CSS -->
    <link rel="stylesheet" href="{{ asset('login/css/style.css') }}"> 
 </head>


 <body>
  <!-- header design -->
  <header>
    <nav class="navbar navbar-expand-lg navigation-wrap">
      <div class="container-fluid bg-light">
         <a class="navbar-brand" href="#"><img src="{{ asset('login/images/logo.png') }}">Prosync</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
          aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-stream navbar-toggler-icon"></i>
         </button>
          <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#Request For Demo">Request For Demo
                </a>                                                         
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#Check Live Application">Check Live Application</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#Connect With Us !!!">Connect With Us !!!</a>
                </li>
                <li class="nav-item redimg">
                  <a class="nav-link text-danger" href="#Login">Login</a>
                </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
    <!-- section-1 top-banner -->
    <section id="Request For Demo">
        <div class="container-fluid px-0 top-banner img-fluid">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <h1>A Creative way to<br> manage your <br>Education System. </h1>              
              </div>
            </div>
          </div>
        </div>
    </section>

    <!-- section-2 services -->
   <section class="service">
    <div class="container px-4 py-5 mt-5">
        <h3 class="pb-2 redimg text-center"> Go Beyond unlimited features</h3>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
          <div class="col d-flex align-items-start">
            <div class=" me-3">
               <img src="{{ asset('admin/images/service/icons.jpg') }}">
            </div>
            <div>
              <h2> Trusted Servers</h2>
              <p1> Our server are added with anti hack feature and latest security features. We provide separate server to each individual client.
              </p1>    
            </div>
          </div>

          <div class="col d-flex align-items-start">
            <div class="me-3">
              <img src="{{ asset('admin/images/service/gift.jpg') }}">
            </div>
            <div>
              <h2> Extra/Complete  Features</h2>
              <p1> We keeps on adding extra feature to our application in order to help your business and make your tracking easy</p1>         
            </div>
          </div>

          <div class="col d-flex align-items-start">
            <div class="me-3">
               <img src="{{ asset('admin/images/service/Group.jpg') }}">
            </div>
            <div>
              <h2>Year Round Maintenance </h2>
              <p1> Our team is available 24 * 7 year round, for the maintenance and support of the application, So that you can relax and see your business grow.</p1>
            </div>
          </div>
        </div>
      </div>
    </section>

   <!-- section-3 about-->
  <section id="about">
    <div class="about-section wrapper">
      <div class="container-fluid bg-light mt-5 mb-5">
        <div class="row text-center">
          <div class="col-sm-12 col-md-6 mb-lg-0 mb-5">
            <div class="mt-5 mb-5">
              <img src="{{ asset('admin/images/img 1.png') }}" class="section-3 img-fluid">
            </div>
          </div>
          <div class="col-sm-12 col-md-6 text-sec">
           <h3> We help you to boost your<br>
            business with efficient  and <br>optimized  management system.</h3>
           <p><b>ProSync</b> gives you multi user level access which gives<br> owner an extra control over the business and application.<br> It gives  fastest sync of data on fastest server available.<br> With year round maintenance services .We believe in best<br> and that’s what we deliver.</p>          
          </div>
        </div>
      </div>
    </div>
  </section>

 <!-- section-4 -->
 <section>
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-6 content">
        <h3>we are committed to provide <br>extra layer of protection to <br>your data.</h3>
        <p>  <b>ProSync</b> not only comes with latest safety and Anti hack features but also we provide extra layer of security by providing separate server to our each client, allowing us to prevent any unfortunate events to happen and also help us to recover the data quickly in case of any mis happenings.</p>
      </div>
      <div class="col-sm-6 col-md-6 mt-5 mb-5">
        <img src="{{ asset('admin/images/img2.jpg') }}" class="img-hero img-fluid">
      </div>
    </div>
  </div>
 </section>

  <!-- section-5 -->
    <section id="Connect With Us !!!">
      <div class="mt-5 mb-3">
        <div class="container">
          <div class="row text-center">      
            <div class="col-sm-12 col-md-12 mt-5">
             <h3> Close to 100 of user we have in INDIA <br>with happy feedback</h3>
             <p class="mt-4"> We are happy to announce that we are able to add 60 + customer from all over states and still counting</p>              
            </div> 
          </div>
          <div class="row text-center">     
            <div class="col-sm-12 col-md-12">
              <div class="text-center mt-5 mb-5">
                <img src="{{ asset('admin/images/users.jpg') }}" class="img-fluid">
              </div>
            </div>
          </div>        
       </div>
     </div>
   </section>

 <!-- section-6 youtube video -->
 <section id="Check Live Application">
  <div class="container-fluid mt-3 mb-3">
    <div class="row bg-light">
      <div class="col-sm-12 col-md-12">
        <h3 class="pb-2 redimg text-center mt-5">Check Our Live Application </h3>
        <!-- <img src="images/youtube 1.jpg"> -->
        <div class="text-center mt-5 mb-5">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/qRJuvP-k7e4?si=Qm3vzVRnDrxpk-ms" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
 </section>

  <!-- section-7 footer-->
  <div class="container-fluid bg-light mt-5">
   
    <footer id="footer">
    
      <div class="container-fluid section7">
        <div class="row bg-light">
          <div class="col-sm-12 col-md-12 text-center mt-5">

            <div class="container">
              <div class="wrapper">
                <div class="wrapper__img mt-5">
                    <img src="{{ asset('admin/images/logo.png') }}" style="width: 45px; height:45px ;"> <span class="prosync">ProSync</span>
                    <p>A product from Invisor</p>
                </div>

                <div class="wrapper__service flex mt-5">                   
                  <a href="#Request For Demo">Request For Demo</a>
                  <a href="#Check Live Application">Check Live Application</a>
                  <a href="#Connect With Us !!!">Connect With Us !!! </a>
                  <a class="text-danger" href="#Login">Login </a>                
                </div>

              </div>                           
           </div>         
          </div>
        </div>  
      </div>
   

<!-- footer section 8-->
	<div class="container">
		<div class="wrapper">
			<div class="wrapper__img">
				<img src="{{ asset('admin/images/logo1.png') }}" alt="">
				<p>Innovating your Dreams</p>
			</div>

			<div class="wrapper__service">
				<h3>Services</h3>
				<a href="">Web Development</a>
				<a href="">Mobile App Development</a>
				<a href="">Digital Marketing</a>
				<a href="">SEO Services</a>
				<a href="">SMM Services</a>
			</div>
			
			<div class="wrapper__touch">
				<h3>Get in Touch</h3>
				<a>C-885, Mahanagar, Lucknow <br>226006 (Head Office)</a>
				<a href="">info@invisortech.com</a>
				<a href="">+91 73092 52227</a>
			</div>

			<div class="wrapper__follow">
				<h3>Follow Us</h3>
				<div class="social">
					<a href="" target="_blank">
						<img src="https://invisortech.com/frontend/svg/facebook.svg" alt="">
					</a>
					<a href="" target="_blank">
						<img src="https://invisortech.com/frontend/svg/instagram.svg" alt="">
					</a>
					<a href="" target="_blank">
						<img src="https://invisortech.com/frontend/svg/linkedin.svg" alt="">
					</a>
					<a href="" target="_blank">
						<img src="https://invisortech.com/frontend/svg/youtube.svg" alt="">
					</a>
					<a href="">
						<img src="https://invisortech.com/frontend/svg/github.svg" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
  

  <div class="container-fluid bg-light">
	<div class="container">
		<div class="wrapper2">
			<div class="wrapper__left">
				<h5 class="copyright"><i class="fa fa-copyright"></i> All Right Reserved</h5>
			</div>

			<div class="wrapper__right">
				<div class="quick-link">
					<a href="">Privacy Policy</a>
					<a href="">Terms of Use</a>
					<a href="">Packages</a>
					<a href="">FAQs</a>
					<a href="">About Us</a>
				</div>
			</div>
		</div>
	</div>
</div>
</footer>
</div>
  
   
 

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-lg-square back-to-top"><img src="{{ asset('admin/images/Polygon 1.png') }}" alt=""></a>

  <!-- JS Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
   
   
 </body>
 </html>