<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="mainpage.css">
    <link rel="stylesheet" href="formStyle.css">
    <title>User Login</title>
</head>
<body>
<div class="container mt-5 d-flex justify-content-center border p-4 rounded border-secondary" id="loginControl">
    <div class="col">
        <div class="text-center">
            <img class="mb-2 pr-4" src="https://i.imgur.com/WsbTtwa.png" alt="company's logo" width="310" height="75">
        </div>
        <div class="mt-3">

            <form id="form1" action="" method="">
                <h2 class="mb-3">Choose a new password</h2>
                <p>Make sure your new password is 6 characters or more. Try including numbers, letters and punctuation marks.</p>
                <div class="form-group mt-2">
                    <label for="password">New password:</label>
                    <input type="password" class="form-control" id="pwd1" name="pwd1" required>
                </div>
                <div class="form-group mt-2">
                    <label for="password">Confirm new password:</label>
                    <input type="password" class="form-control" id="pwd2" name="pwd2" required>
                    <?php
                        // if (isset($_GET['message'])) {
                        //     $message = urldecode($_GET['message']);
                        //     echo "<p style='color:red'>$message</p>";
                        // }
                    ?>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <input type="submit" class="mt-2 btn btn-dark" name="submit" value="Submit">
                    </div>
                </div>
            </form>

            <form id="form2" method="" action="">
                <h2 class="mb-3">Find your Twitter account</h2>
                <p>Enter the email associated with your account to change your password.</p>
                <div class="form-group mt-2">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="pwd1" name="pwd1" required>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <input type="submit" class="mt-2 btn btn-dark" name="submit" value="Send">
                    </div>
                </div>
            </form>

            <form id="form3" method="" action="">
                <h2 class="mb-3">We sent you a code</h2>
                <p>Check your email to get your confirmation code.</p>
                <!-- <input type="number" class="form-control" id="code" name="code" value="submit" placeholder="Enter your code"> -->
                <label for="verification-code">Email Verification Code:</label>
                <div class="email-verification-form-group codeForm mt-3 justify-content-center">
                    <input type="text" id="digit1" name="digit1" class="email-verification-form-control text-center" maxlength="1" min="0" max="9" placeholder="-" required>
                    <input type="text" id="digit2" name="digit2" class="email-verification-form-control text-center" maxlength="1" min="0" max="9" placeholder="-" required>
                    <input type="text" id="digit3" name="digit3" class="email-verification-form-control text-center" maxlength="1" min="0" max="9" placeholder="-" required>
                    <input type="text" id="digit4" name="digit4" class="email-verification-form-control text-center" maxlength="1" min="0" max="9" placeholder="-" required>
                    <input type="text" id="digit5" name="digit5" class="email-verification-form-control text-center" maxlength="1" min="0" max="9" placeholder="-" required>
                    <input type="text" id="digit6" name="digit6" class="email-verification-form-control text-center" maxlength="1" min="0" max="9"placeholder="-" required>
                </div>
                    <div class="col mt-4">
                        <input type="submit" class="btn btn-dark" name="submit" value="Submit">
                    </div>
            </form>

            <button type="button" class="mt-3" id="show-form1">111</button>
            <button type="button" id="show-form2">222</button>
            <button type="button" id="show-form3">333</button>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
  $('#form1, #form2, #form3').hide();
$(document).ready(function() {
    $('#show-form1').on('click', function() {
    $('#form1').show();
    $('#form2, #form3').hide();
    });

    $('#show-form2').on('click', function() {
    $('#form2').show();
    $('#form1, #form3').hide();
    });

    $('#show-form3').on('click', function() {
    $('#form3').show();
    $('#form1, #form2').hide();
    });
});
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