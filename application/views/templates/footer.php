</div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <!--<script src="http://getbootstrap.com/assets/js/docs.min.js"></script>-->
    <script src="http://localhost/assets/js/chosen.jquery.min.js"></script>
    <script src="/assets/js/bootstrap-timepicker.min.js"></script>
	
<script type="text/javascript" src="/assets/js/colorpicker.js"></script>

    <script type="text/javascript">
	
		$('#inputColor').ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorBox').css('backgroundColor', '#' + hex);
				$('#inputColor').val('#' + hex);
			}
		})
    
        $('.chosen-select').chosen({width:"100%"});

        $('#timepicker1').timepicker({
                minuteStep: 5,
                defaultTime: false,
                showInputs: false,
                showMeridian: false,
                disableFocus: true
            });

        $('#timepicker2').timepicker({
                minuteStep: 5,
                defaultTime: false,
                showInputs: false,
                showMeridian: false,
                disableFocus: true
            });
    </script>

  </body>
</html>
