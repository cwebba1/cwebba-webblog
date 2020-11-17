/*! modal.js 060220 - from CWebba06 2014
*  ModalJavaScript  */
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
