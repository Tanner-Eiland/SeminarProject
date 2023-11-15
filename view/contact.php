<?php include("view/header.php") ?>

    <section id="page-header" class="about-header">
        
        <h2>#let's_talk</h2>
        
        <p>LEAVE A MESSAGE. We love to hear from you!</p>
        
    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency locations or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p>600 Park Street Hays, KS 67601</p>
                </li>
                <li>
                    <i class="fal fa-envelope"></i>
                    <p> tmeiland@mail.fhsu.edu</p>
                </li>
                <li>
                    <i class="fal fa-phone-alt"></i>
                    <p> 785-432-3422</p>
                </li>
                <li>
                    <i class="fal fa-clock"></i>
                    <p> Monday to Saturday: 9:00am to 16.pm</p>
                </li>
            </div>
        </div>

        <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4392.9166335077425!2d-99.3480706419081!3d38.872266763061916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87a1799d081b1ffd%3A0x75ed428eb6b7e5fa!2sFort%20Hays%20State%20University!5e0!3m2!1sen!2sus!4v1698779848598!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
    </section>
    
    <section id="form-details">
        <form method="." method="post" id="message_form" class="message_form" >
            <input type="hidden" name="action" value="message_home_page">
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Your Name" name="name" required>

            <label for="message_email"><b>Email</b></label>
            <input type="text" placeholder="Email" name="message_email" required>

            <label for="subject"><b>Subject</b></label>
            <input type="text" placeholder="Subject" name="subject" required>

            <label for="message"><b>Message</b></label>
            <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message" required></textarea>

            <button class="normal">Submit</button>
        </form>
    

    <div class="people">
        <div>
            <img src="img/people/1.jpg" alt="">
            <p><span>Tanner Eiland</span> Web Developer
            <br>
            Phone: 785-432-3422
            <br>
            Email: tmeiland@mail.fhsu.edu</p>
        </div>
    </div>
    </section>
<!--
    <section id="newsletter" class="section-p1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest show and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>
        -->
    <?php include("view/footer.php") ?>