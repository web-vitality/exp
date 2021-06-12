<?php

    require_once 'classes/FormHandler.php';
    if(isset($_POST['submit']) && !empty($_POST)){
        
        $db = new FormHandler();
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Vitaliy Olshanetsky</title>
  </head>
  <body>

   <div class="container">
    <h1>Add Post</h1>
        <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" style="max-width: 680px;" novalidate>
           <div class="row">
            <div class="col">
                    <label class="form-label d-block">
                        User name
                        <input type="text" name="userName" class="form-control" required>
                    </label>
                </div>
                <div class="col">
                    <label class="form-label d-block">
                        User email
                        <input type="email" name="userEmail" class="form-control" required>
                    </label>
                </div>
           </div>
            <div class="mb-3">
                <label class="form-label d-block">
                    Post title
                    <input type="text" name="postTitle" class="form-control" required>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label d-block">
                    Post body
                    <textarea class="form-control" name="postBody" cols="30" rows="10" required></textarea>
                </label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
   </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

    <script>
        (function () {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
                })
        })()
    </script>
  </body>
</html>