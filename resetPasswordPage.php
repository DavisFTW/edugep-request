<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="formsStyle.css">
    <title>Reset Password</title>
</head>
<body>
<div class="container mt-5 d-flex justify-content-center border p-4 rounded border-secondary" id="loginControl">
    <div class="col">
        <div class="text-center">
            <img class="mb-2 pr-4" src="https://i.imgur.com/WsbTtwa.png" alt="company's logo" width="310" height="75">
        </div>
        <div class="mt-3">
            <form id="form2" method="GET" action="resetpassword.php">
                <h2 class="mb-3">Find your account</h2>
                <p>Enter the email associated with your account to change your password.</p>
                <div class="form-group mt-4">
                    <input type="email" class="form-control inputField " id="email" name="email" placeholder="Your e-mail" required>
                </div>
                <div class="row mt-3">
                    <div class="col text-end">
                        <input type="submit" class="formButton" name="submitemail" value="Send">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function() {
  var inputs = $(".email-verification-form-control");
  inputs.keyup(function() {
    var index = inputs.index(this);

    if (index < inputs.length - 1 && this.value) {
      inputs.eq(index + 1).focus();
    }
  });
});

$(document).ready(function() {
  $('.email-verification-form-control').on('input', function() {
    var $this = $(this);
    if ($this.val().length == $this.attr('maxlength')) {
      var index = $('.email-verification-form-control').index(this);
      if (index < 5) {
        $('.email-verification-form-control').eq(index + 1).focus();
      }
    } else if ($this.val().length == 0) {
      var index = $('.email-verification-form-control').index(this);
      if (index > 0) {
        $('.email-verification-form-control').eq(index - 1).focus();
      }
    }
  });
});

</script>
</html>