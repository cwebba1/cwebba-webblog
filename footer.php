<!--footer_02.php-->
<!-- 110920
    102920 built from cwebba08b -->
<footer>
<div class="grid-wrapper">
    <div class="context">
    	<h4>Craig Webb Art<h4>
        <p>Communications that&nbsp;move&nbsp;consumers.</p>
        <p class="concept">Creative concepts, copywriting and&nbsp;design</p>
    </div>

   	<nav class="socialnav">
<?php get_template_part( 'partials/socialnav' ); ?>
    </nav>
    <aside class="join">
    	<a href="#" id="modalBtn">Join Our Mailing List</a>
    </aside>
</footer>
    <div>
<?php get_template_part( 'partials/top-copyright' ); ?>     
    </div>
	<!-- Position Relative partial goes here -->
</div><!-- END Basal -->
<!--  SOCIAL MODAL BOX  -->
<div id="modal_box">
<form id="mail-list" method="post" name="subscription-form" action="support/formtoemailpro.php"><!-- contact-form -->
<header class="mod">
<h5>Subscribe to our mailing list</h5>
<figure><img class="mod" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/menu_buttons/airplane.jpg"></figure>
<div class="receive"><p>Receive periodic reviews,  updates about current events and special offers.</p></div>
</header>
<br class="clear"/>
<article class="subscribe">
<div id="fieldset">
<legend>Your Contact Information</legend>
<ul>
<li>
<label for=first-name>First Name</label>
<input id=first-name name=first-name type=text placeholder="First name" required autofocus>
</li>
<li>
<label for=last-name>Last Name</label>
<input id=last-name name=last-name type=text placeholder="Last Name" required>
</li>
<li>
<label for=email>Email</label>
<input id=email name=email type=email placeholder="example@domain.com" required>
</li>
<li>
<label for=email>Website</label>
<input id=website name=website type=website placeholder="http://your-domain.com" >
</li>
<li>
<label for=phone>Phone</label>
<input id=phone name=phone type=tel placeholder="Eg. +1-212-000-0000">
</li>
<li  id="message">
<label for=comments class="comments">Comment here</label>
<textarea type="text" name="comments" value="comment" rows="8"></textarea>
</li>
</ul>
<div class="updates">
<label for="email-updates" class="wide2">Send Special Offers</label>
<input type="checkbox" unchecked name="email-updates"></div>
<button class="social-button" type=submit name=submit value=submit>Send!</button>
</div><!-- END id="fieldset" -->
</article>
</form>
<footer id="modfoot">
    <div class="signup">
        <a class="mail-me" href="mailto:craigwebb@craigwebbart.com">Email Craig Webb Art</a>
        <a id="modal-closeBtn" class="btn-grn">Close Window</a>
    </div>
</footer>
</div>
<!-- *   *   *   *   *   *   *    -->

<!-- ModalJavaScript -->
<script type="text/javascript">
window.onload=function() {
var modal_btn = document.getElementById('modalBtn');
var fader = document.getElementById('modal_fader');
var modal_box = document.getElementById('modal_box');
var closemodal = document.getElementById('modal-closeBtn');
//Display modal box
modal_btn.onclick=function() {
   fader.style.display = "block";
   modal_box.style.display = "block";}
//Hide modal Box
closemodal.onclick = function() {
    fader.style.display = "none";
    modal_box.style.display = "none";}}
</script>
<?php wp_footer(); ?>
</body>
</html>