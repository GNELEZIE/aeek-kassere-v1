
	<footer class="footer-six">
		<div class="overlay">
			<div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h2>A propos</h2>
                        <p>AEEK est la seule association des élèves et étudiants de Kasséré ....
                            <a href="<?=$domaine?>/a-propos" style="color: #696969 !important;">en savoir plus</a>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h2 >Navigation</h2>
                        <ul>
                            <li><a href="<?=$domaine?>/contact">Contact</a> </li>
                            <li><a href="<?=$domaine?>/blog">Actualité</a> </li>
                            <li><a href="<?=$domaine?>/events">Galerie</a> </li>
                            <li><a href="<?=$domaine?>/emplois">Ofres d'emplois</a> </li>
                            <li><a href="https://www.youtube.com/channel/UCDhp_Sepv7QJEmiTdCRAuXg" target="_blank">Web tv</a> </li>
                        
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h2 >Liens utils</h2>
                        <ul>
                            <li><a href="#">Nos statuts</a> </li>
                            <li><a href="#">Bureau</a> </li>
                            <li><a href="#">MUDESKA</a> </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h2 >Contacts</h2>
                        <ul class="pb-3">
                            <li><a href="mailTo:contact@aeek-kassere.com"><i class="fa fa-envelope"></i>  contact@aeek-kassere.com</a> </li>
                            <li><a href="tel:0022546859936"><i class="fa fa-phone"></i> +255 05 46 85 99 36</a> </li>
                            <li><a href="#"><i class="fa fa-whatsapp"></i> +255 05 46 85 99 36</a> </li>
                        </ul>
                        <ul class="event-social">
                            <li><a href="https://www.facebook.com/aeekkassere" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>


			</div>
		</div>
        <div class="container-fluid" style="background: #2b2b2b; padding: 27px;">
            <div class="container">
                <p class="text-center">Copyright &copy;AEEK 2022. Design and Development by <a href="#" class="color-orange">Gnelezie Ouattara </a></p>
            </div>
        </div>
	</footer>
	<script src="<?=$asset?>/js/jquery-3.1.1.min.js"></script>
	<script src="<?=$asset?>/js/jquery-migrate-1.4.1.min.js"></script>

	<!-- Bootstrap -->
	<script src="<?=$asset?>/js/bootstrap.min.js"></script>
    <script src="<?=$asset?>/plugins/ani/wow.js"></script>
	<!-- Coundown -->
	<script src="<?=$asset?>/js/jquery.countdown.min.js"></script>

	<!--Swiper-->
	<script src="<?=$asset?>/js/swiper.jquery.min.js"></script>

	<!--Masonry-->
	<script src="<?=$asset?>/js/masonry.pkgd.min.js"></script>

	<!--Lightcase-->
	<script src="<?=$asset?>/js/lightcase.js"></script>

	<!--modernizr-->
	<script src="<?=$asset?>/js/modernizr.js"></script>

	<!--velocity-->
	<script src="<?=$asset?>/js/velocity.min.js"></script>

	<!--quick-view-->
	<script src="<?=$asset?>/js/quick-view.js"></script>

	<!--nstSlider-->
	<script src="<?=$asset?>/js/jquery.nstSlider.js"></script>
	<script src="<?=$asset?>/js/nstfunctions.js"></script>

	<!--flexslider-->
	<script src="<?=$asset?>/js/flexslider-min.js"></script>
	<script src="<?=$asset?>/js/flexfunctions.js"></script>

	<!--directional-->
	<script src="<?=$asset?>/js/directional-hover.js"></script>
	<!-- parallax.js -->
	<script src="<?=$asset?>/js/parallax.js"></script>
	<script src="<?=$asset?>/js/theia-sticky-sidebar.js"></script>

	<!--easing-->
	<script src="<?=$asset?>/js/jquery.easing.min.js"></script>

    <script src="<?=$asset?>/plugins/sweetalert/sweetalert2.min.js" type="text/javascript"></script>

<!--    <script src="--><?//=$asset?><!--/plugins/sweetalert/sweet-alert.min.js"></script>-->
    <script src="<?=$asset?>/js/custom.js"></script>


<!--    <script src="--><?//=$asset?><!--/plugins/lity/vendor/jquery.js"></script>-->
    <script src="<?=$asset?>/plugins/lity/dist/lity.js"></script>
    <script src="<?=$asset?>/plugins/intltelinput/js/intlTelInput.min.js"></script>
<!--    <script src="--><?//=$asset?><!--/plugins/lity/assets/prism.js"></script>-->


    <script>
        wow = new WOW(
            {
                animateClass: 'animated',
                offset:       100,
                callback:     function(box) {
                    console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                }
            }
        );
        wow.init();
    </script>
</body>

</html>