<form class="js-form">
    <div class="row">
        <div class="form-group col-sm-6 col-lg-4">
            <input class="input-gray" type="text" name="name" required placeholder="Name*">
        </div>
        <div class="form-group col-sm-6 col-lg-4">
            <input class="input-gray" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group col-sm-12 col-lg-4">
            <input class="input-gray" type="text" name="subject" placeholder="Subject (Optinal)">
        </div>
        <div class="form-group col-sm-12">
            <textarea class="input-gray" name="message"  required  placeholder="Message*"></textarea>
        </div>
        <div class="col-sm-12"><button type="submit" class="btn-upper btn-yellow btn">Send Message</button></div>
    </div>
    <div class="success-message"><i class="fa fa-check text-primary"></i> Thank you!. Your message is successfully sent...</div>
    <div class="error-message">We're sorry, but something went wrong</div>
</form>
