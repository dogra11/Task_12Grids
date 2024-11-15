<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - OnestopNDT</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand offset-md-1" href="#"><img src="images/colourlogo.png" style="width: 55%"></a>
        </div>
    </nav>

<div class="container mt-5">
    <div class="contact-container mt-5">
        <?php
            $nameErr = $emailErr = $organisationErr = $contactErr = "";
            $name = $email = $message = $organisation = $contact = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $valid = true;

                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                    $valid = false;
                } else {
                    $name = test_input($_POST["name"]);
                }

                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                    $valid = false;
                } else {
                    $email = test_input($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                        $valid = false;
                    }
                }

                if (empty($_POST["organisation"])) {
                    $organisationErr = "Organisation name is required";
                    $valid = false;
                } else {
                    $organisation = test_input($_POST["organisation"]);
                }

                if (empty($_POST["contact"])) {
                    $contactErr = "Contact number is required";
                    $valid = false;
                } else {
                    $contact = test_input($_POST["contact"]);
                    if (!preg_match("/^[0-9]{10}$/", $contact)) {
                        $contactErr = "Invalid contact number";
                        $valid = false;
                    }
                }

                if ($valid) {
                    echo '<div class="alert alert-success" id="success-message">Form submitted successfully!</div>';
                    $name = $email = $message = $organisation = $contact = "";
                    
                }
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
        <form class="row g-3 text-start" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- First Column (Name, Email ID, and Message) -->
            <div class="col-md-6" style="text-align: left;">
                <h1 style="color: rgb(78, 78, 78);">Got any questions?</h1>
                <p style="color: rgb(78, 78, 78);">Let’s discuss it over a cup of coffee.</p>
            </div>

            <!-- Second Column Split into Two Rows -->
            <div class="col-md-6">
                <div class="row justify-content-end">
                    <!-- Name and Email in Half Column -->
                    <div class="col-md-6">
                        <div class="mb-4">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $name;?>" required>
                            <span class="text-danger"><?php echo $nameErr;?></span>
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email ID" value="<?php echo $email;?>" required>
                            <span class="text-danger"><?php echo $emailErr;?></span>
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control" id="message" name="message" placeholder="Message" rows="5"><?php echo $message;?></textarea>
                        </div>
                    </div>
                    <!-- Organisation Name and Contact Number in Half Column -->
                    <div class="col-md-6">
                        <div class="mb-4">
                            <input type="text" class="form-control" id="organisation" name="organisation" placeholder="Organisation Name" value="<?php echo $organisation;?>" required>
                            <span class="text-danger"><?php echo $organisationErr;?></span>
                        </div>
                        <div class="mb-4">
                            <input type="tel" class="form-control" id="contact" name="contact" placeholder="Contact Number" value="<?php echo $contact;?>" required>
                            <span class="text-danger"><?php echo $contactErr;?></span>
                        </div>
                        <div class="mt-5 pt-1">
                            <button type="submit" class="submit-btn mt-5 offset-md-5 btn-primary btn-lg btn-border-radius-lg">Submit →</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="map-container mt-4">
    <div class="map" style="padding: 100px;">
        &nbsp;
        <div class="card offset-md-1" style="width:28rem;border-radius: 8px;">
          <div class="card-body p-5">
            <h5 class="card-title pl-2 mb-4">OnestopNDT</h5>
            <p class="card-subtitle pl-2">PAP/R/406 Rabale MIDC Near Dol Electric</p>
            <p class="card-subtitle mb-2 pl-2 pt-1">Company Rabale MIDC, Navi Mumbai - 400701</p>
            <p class="card-text pl-2">Landline - 022 4131 0099</p>
            <div style="display: flex; align-items: center;">
                <a href="https://maps.app.goo.gl/UTkUNYrhkAvrpWmE9">
                <img src="images/g.png" alt="Logo" style="margin:6px; width: 25px;border-radius: 5px;">
                <span class="text-decoration-none">Google Map Link</span>
                </a>
            </div>
          </div>
        </div>
        &nbsp;
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="row g-3 justify-content-around">
        <div class="col-md-2" id="btm-row">
            <img src="images/companies.png" style="width:150px;border-radius: 10px;">
        </div>
        <div class="col-md-2" id="btm-row">
            <img src="images/jobs.png" style="width:150px;border-radius: 10px;">
        </div>
        <div class="col-md-2" id="btm-row">
            <img src="images/articles.png" style="width:150px;border-radius: 10px;">
        </div>
        <div class="col-md-2" id="btm-row">
            <img src="images/webinars.png" style="width:150px;border-radius: 10px;">
        </div>
        <div class="col-md-2" id="btm-row">
            <img src="images/forums.png" style="width:150px;border-radius: 10px;">
        </div>
        <div class="col-md-2" id="btm-row">
            <img src="images/appnotes.png" style="width:150px;border-radius: 10px;">
        </div>
    </div>
</div>
</body>

<footer>
    <div class="contact-footer pb-4">
        <div class="container">
            <img src="images/whitelogo.png" width="200px" style="float: right;margin-bottom: 20px;margin-top: 50px;">
            <hr style="color: rgb(255, 255, 255);height: 1px;width: 100%;opacity: 1;margin-bottom: 30px;">
            <p style="color: white;font-family: sans-serif;">What is One Stop NDT?</p>
        </div>
    </div>
</footer>

<script>
    // JavaScript to fade out the success message
    document.addEventListener("DOMContentLoaded", function () {
        const successMessage = document.getElementById("success-message");
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.transition = "opacity 1s ease";
                successMessage.style.opacity = "0";
                setTimeout(() => successMessage.remove(), 1000); // Remove the element after it fades out
            }, 5000); // Wait 5 seconds before starting the fade-out
        }
    });
</script>
</html>
