<!--footer.php-->
<footer>
<nav class="footstep"><ul class="footsy">
<li><a>Advertising</a></li>
<li><a>Brand&nbsp;Identity</a></li>
<li><a>Graphic&nbsp;Design</a></li>
<li><a>Marketing</a></li>
</ul>
</nav>

<div class="footmove"><h4>Craig Webb Art<h4>
<p>Communications that&nbsp;move&nbsp;consumers.</p>
<p class="concept">Creative concepts, copywriting and&nbsp;design</p>
</div>
<nav class="newslet">
<ul class="socialnav"> <li><a href="http://www.flickr.com/photos/cwebba/" class="icon-flickr" target="_blank"></a></li
><li> <a href="https://twitter.com/cwebba1" class="icon-twitter" target="_ "></a></li
><li> <a href="http://linkedin.com/in/craigwebbart/" class="icon-linkedin" target="_ "></a></li
><li> <a href="https://plus.google.com/u/0/108591146330842885632" class="icon-gplus" target="_ "></a></li
><li class="last"> <a href="https://github.com/cwebba1" class="icon-github-circled" target="_ "></a> &nbsp;</li>
</ul>
</nav>
<aside class="join"><a href="#" id="modalBtn">Join Our Mailing List</a></aside> 
</footer>
<div style="position:relative;">
<div class="tothetop"><p class="back2top"><a href="#">Back to Top</a></p></div>
<p class="copyright">&copy; 2005 &ndash; <script type='text/javascript'>if (typeof(getCopyrightDate)=='function') document.write(getCopyrightDate(2015, null, '-')); else document.write((new Date()).getFullYear());</script> Craig Webb Art. &nbsp;All&nbsp;Rights&nbsp;Reserved.</p>
</div>

</div><!-- END Wrapper -->

<!--  SOCIAL MODAL BOX  -->
<div id="modal_box">
<form id="mail-list" method="post" name="subscription-form" action="support/formtoemailpro.php"><!-- contact-form -->
<header class="mod">
<h5>Subscribe to our mailing list</h5>
<figure><img class="mod" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/airplane.jpg"></figure>
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
<input type="checkbox" checked name="email-updates"></div>
<button class="social-button" type=submit name=submit value=submit>Send!</button>
</div><!-- END id="fieldset" -->
</article>
</form>
<footer id="modfoot">
<nav style="padding:0;margin:0;">
<ul class="signup">
<li><a href="mailto:craigwebb@craigwebbart.com">Send an email to Craig Webb Art</a></li>
<li class="last">Copyright &copy; <script type='text/javascript'>if (typeof(getCopyrightDate)=='function') document.write(getCopyrightDate(2015, null, '-')); else document.write((new Date()).getFullYear());</script>
<a href="http://craigwebbart.com" target="_blank">Craig Webb Art</a></li>
<span class="stretch"></span> 
</ul>
</nav>
<span id="modal-closeBtn" class="modal-close-btn">Close Window</span><br />
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

<script>
// https://www.html5andbeyond.com/wordpress-jquery-document-ready-function/
jQuery(document).ready(function( $ ) {
$(document).ready(function(){ $('.top > li').make_dropdown(); });
$('#menubar > li').make_dropdown({'timeout' : 250});
});
</script>
<?php wp_footer(); ?>
</body>
</html>