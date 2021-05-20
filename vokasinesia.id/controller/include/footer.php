    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>    
    <script src="vendor/summernote/summernote-lite.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    
    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script type="text/javascript">
        function klikSubmit(a) {
            if(a==1){
                document.getElementById("myform").target = "_parent";
                document.getElementById("myform").submit();
                return false;
            }
            else if(a==0){
                document.getElementById("myform").target = "_blank";
                document.getElementById("myform").submit();
                return false;
            }
        }
    </script>
    <script type="text/javascript">
        $(function() {
            Morris.Donut({
                element: 'morris-donut-chart',
                data: [{
                    label: "Anak-Anak",
                    value: 12
                }, {
                    label: "Dewasa",
                    value: 30
                }, {
                    label: "Orang Tua",
                    value: 20
                }],
                resize: true
            });    
        });
    </script>

    <script src="vendor/tags/tagify.min.js"></script>

    <!-- bootstrap-datetimepicker -->
    <script type="text/javascript" src="vendor/bootstrap-datetimepicker/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker4').datetimepicker({
              format: 'DD/MM/YYYY HH:mm'
            });
        });
    </script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            "order": [[ 3, "desc" ]],
            'columnDefs': [ {
            'targets': [4],
            'orderable': false,
            }]
        });

        $('#komentar').DataTable({
            responsive: true,
            "order": [[ 3, "desc" ]],
            'columnDefs': [ {
            'targets': [4],
            'orderable': false,
            }]
        });

        $('#dataTables-survey').DataTable({
            responsive: true,
            "order": [[ 3, "desc" ]],
            'columnDefs': [ {
            'targets': [3],
            'orderable': false,
            }]
        });

        $('#dataTables-user').DataTable({
            responsive: true,
            "order": [[ 0, "desc" ]],
            'columnDefs': [ {
            'targets': [3],
            'orderable': false,
            }]
        });
    });
    </script>
    <script src="js/misc.js?<?php echo(rand(1,9999999)); ?>"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="form-group"><input type="text" name="field_name[]" placeholder="Nama Kolom" value="" /> <input type="text" name="field_content[]" placeholder="Isi Kolom" value=""/><a href="javascript:void(0);" class="remove_button"> <img src="vendor/remove-icon.png"/></a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });



        //===============//
        var addButton2 = $('.add_button2'); //Add button selector
        var wrapper2 = $('.field_wrapper2'); //Input field wrapper
        var fieldHTML2 = '<div class="form-group"><input type="text" name="pilihan_survey[]" class="form-control" style="width: 80%;display: inline;" placeholder="nama pilihan survey" value="" required/><a href="javascript:void(0);" class="remove_button2"> <img src="vendor/remove-icon.png"/></a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton2).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper2).append(fieldHTML2); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper2).on('click', '.remove_button2', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>

</body>

</html>
