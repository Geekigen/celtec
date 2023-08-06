  <!-- footer -->
  <footer class="bg-light py-3 mt-4">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="/admin">Admin</a></li>
          </ul>
        </div>
        <div class="col-sm-3">
          <h5>Follow Us</h5>
          <ul class="list-unstyled">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
          </ul>
        </div>
        <div class="col-sm-3">
          {{-- <h5>Subscribe</h5>
          <form style="display:hidden;">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-secondary btn-block">Subscribe</button>
          </form> --}}
        </div>
        <div class="col-sm-3">
          <p class="text-muted">&copy; <span id="year"></span> Celtec </p>
        </div>
      </div>
    </div>
    
<script>
  const currentYear = new Date().getFullYear();
  document.getElementById("year").textContent = currentYear;
</script>

  </footer>