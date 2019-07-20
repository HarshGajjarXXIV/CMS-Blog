<div class="col-md-4">

  <!-- follow us section -->
  <h3 class="head">Follow Us</h3>
  <hr class="hr-head">
  <div class="panel">
      <div class="panel-body">
          <div class="follow-sidebar">
            <a target="_blank" href="#"><button class="btn btn-primary btn-sidebar btn-fb"><i class='fa fa-facebook fa-lg'>&nbsp;&nbsp;<spam>Facebook</spam></i></button></a>

            <a target="_blank" href="#"><button class="btn btn-info btn-twitter btn-sidebar"><i class='fa fa-twitter fa-lg'>&nbsp;&nbsp;<spam>Twitter</spam></i></button></a>

            <a target="_blank" href="#"><button class="btn btn-danger btn-gplus btn-sidebar"><i class='fa fa-google-plus fa-lg'>&nbsp;&nbsp;<spam>Google Plus</spam></i></button></a>

            <a target="_blank" href="#"><button class="btn btn-danger btn-insta btn-sidebar"><i class='fa fa-instagram fa-lg'>&nbsp;&nbsp;<spam>Instagram</spam></i></button></a>
          </div>
      </div>
  </div>
  <!-- end follow us section -->

  <!-- category section -->
  <h3 class="head">Categories</h3>
  <hr class="hr-head">
  <div class="panel">
      <div class="panel-body">
          <ul class="catlist">
              @foreach ($categories as $category)
              <li><a href="{{ route('category', str_slug($category->name)) }}">{{ $category->name }}</a></li></b>
              @endforeach
          </ul>
      </div>
  </div>
  <!-- end category section -->

  <!-- recent section -->
  @yield('recent')
  <!-- end recent section -->

  <!-- about section -->
  <h3 class="head">More</h3>
  <hr class="hr-head">
  <div class="panel">
      <div class="panel-body">
          <ul class="catlist">
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
            <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
            <li><a href="{{ route('terms') }}">Terms of Service</a></li>
          </ul>
      </div>
  </div>
  <!-- end about section -->

</div>