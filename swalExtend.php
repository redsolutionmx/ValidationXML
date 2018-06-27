 <?php include '../extend/scripts.php'; ?>

 <body>
     <h1>Sweet Alert.js</h1>
     <button>Hey, click me!</button>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
     <script src="swalExtend.js"></script>
     <script>
         var swalFunction = function () {
             swal({
                 title: "Are you sure?",
                 text: "You will not be able to recover this imaginary file!",
                 type: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "#DD6B55",
                 confirmButtonText: "Yes, delete it!",
                 closeOnConfirm: false
             },
                 function () {
                     swal("Deleted!", "Your imaginary file has been deleted.", "success");
                 });
         };

         $("button").click(function () {
             swalExtend({
                 swalFunction: swalFunction,
                 hasCancelButton: true,
                 buttonNum: 2,
                 buttonColor: ["blue", "yellow"],
                 buttonNames: ["maybe delete", "probably/partially delete"],
                 clickFunctionList: [
                     function () {
                         console.debug('ONE BUTTON');
                     },
                     function () {
                         console.debug('TWO BUTTON');
                     }
                 ]
             });
         });

     </script>


 </body>

 </html>
