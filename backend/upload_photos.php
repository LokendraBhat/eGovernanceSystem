   <?php
    $ids = $_GET["id"];
    ?>


   <!DOCTYPE html>
   <html>

   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>upload document</title>
       <!-- bootstrap css -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
       <style>
           body {
               display: flex;
               flex-direction: column;
               align-items: center;
               justify-content: space-between;
               background: linear-gradient(to right, #8E24AA, #b06ab3);
               color: #D7D7EF;
               font-family: 'Lato', sans-serif;
           }

           h2 {
               margin: 50px 0;
               text-align: center;
               text-transform: uppercase;
           }

           .file-drop-area {
               position: relative;
               display: flex;
               align-items: center;
               width: 450px;
               max-width: 100%;
               padding: 25px;
               border: 1px dashed rgba(255, 255, 255, 0.4);
               border-radius: 3px;
               transition: 0.2s;
           }

           .choose-file-button {
               flex-shrink: 0;
               background-color: rgba(255, 255, 255, 0.04);
               border: 1px solid rgba(255, 255, 255, 0.1);
               border-radius: 3px;
               padding: 8px 15px;
               margin-right: 10px;
               font-size: 12px;
               text-transform: uppercase;
           }

           .file-message {
               font-size: small;
               font-weight: 300;
               line-height: 1.4;
               white-space: nowrap;
               overflow: hidden;
               text-overflow: ellipsis;
           }

           .file-input {
               position: absolute;
               left: 0;
               top: 0;
               height: 100%;
               width: 100%;
               cursor: pointer;
               opacity: 0;

           }

           .mt-100 {
               margin-top: 10px;
           }

           #upl {
               float: right;
               margin-top: 10vh;
               width: 200px;
               height: 60px;
               text-transform: uppercase;
           }
       </style>
   </head>

   <body>
       <!-- Include jQuery -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <!-- Include Bootstrap JavaScript with jQuery dependency -->
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

       <!-- Upload section -->
       <div class="container d-flex justify-content-center mt-100">
           <div class="row">
               <div class="col-md-12">
                   <h2>Upload Here</h2>

                   <form method="POST" action="save_photo.php" enctype="multipart/form-data">
                       <!-- Upload Photo -->
                       <label for="pp" class="lab">Upload Photo:</label>
                       <div class="file-drop-area">
                           <span class="choose-file-button">Choose files</span>
                           <span class="file-message">or drag and drop files here</span>
                           <input type="file" name="personal_photo" id="pp" class="file-input" />
                       </div>
                       <br><br>
                       <!-- Upload Citizenship -->
                       <label for="cc" class="lab">Upload Citizenship:</label>
                       <div class="file-drop-area">
                           <span class="choose-file-button">Choose files</span>
                           <span class="file-message">or drag and drop files here</span>
                           <input type="file" id="cc" name="cit_photo" class="file-input" />
                       </div>
                       <div>
                           <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                           <input type="submit" class="btn btn-primary" name="submit" value="upload File" id="upl" onclick="return doValidateFile()">
                       </div>
                   </form>
               </div>
           </div>
       </div>
       <script>
           $(document).on('change', '.file-input', function() {
               var filesCount = $(this)[0].files.length;

               var textbox = $(this).prev();

               if (filesCount === 1) {
                   var fileName = $(this).val().split('\\').pop();
                   textbox.text(fileName);
               } else {
                   textbox.text(filesCount + ' files selected');
               }
           });

           //    Validation for file upload
           function doValidateFile() {
               var pp = document.getElementById("pp");
               var cc = document.getElementById("cc");

               if (pp.value == "") {
                   alert("Please upload your photo");
                   return false;
               }
               if (cc.value == "") {
                   alert("Please upload your citizenship");
                   return false;
               }
               return true;
           }
       </script>
   </body>

   </html>