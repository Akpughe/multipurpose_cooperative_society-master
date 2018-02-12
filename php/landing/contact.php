<div id="contact">
      <div class="container text-center">
        <h3>Contact us</h3>
        <br/>
        <div class="row">
          <div class="col-md">
            
          </div>
          <div class="col-md">
            <form method="POST" action="./php/actions/send_contact.php">
            <div class="form-group">
              <label for="fname">Full Name:</label>
              <input type="text" class="form-control" id="fname" name="full_name" placeholder="John Doe">
            </div>  
            <div class="form-group">
              <label for="email">Email Address:</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="any@any.com">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="message">Message:</label>
              <textarea class="form-control" id="message"  name="message"rows="3"></textarea>
            </div>
            <div class="form-group">
               <button class="btn btn-dark btn-md">Submit</button>
            </div>
          </div>
            </form>
        </div>
      </div>
</div>