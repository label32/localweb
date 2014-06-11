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

    <script type="text/javascript">
    
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
