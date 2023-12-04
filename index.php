<?php include 'inc/header.php'?>

<?php
    $name=$email=$body='';
    $nameErr=$emailErr=$bodyErr='';
    if(isset($_POST['submit'])){
        if(empty($_POST['name'])){
            $nameErr = 'Name is required';
        }else{
            $name = $_POST['name'];
        }

        if(empty($_POST['email'])){
            $emailErr = 'Email is required';
        }else{
            $email = $_POST['email'];
        }

        if(empty($_POST['feedback'])){
            $bodyErr = 'Body is required';
        }else{
            $body = $_POST['feedback'];
        }

        if(empty($nameErr) && empty($emailErr) && empty($bodyErr)){
            $query = "INSERT INTO feedback (name, email, body) VALUES ('$name', '$email', '$body')";

            if(mysqli_query($conn, $query)){
                header('Location: feedback.php');
            }else{
                echo "Error occured". mysqli_error($conn);
            }
        }
    }
?>


        <div class="row justify-content-center mt-2">
            <div class="col-12 col-md-10 col-lg-8 py-3 text-center">
                <img src="https://yt3.googleusercontent.com/ytc/APkrFKYcYswt_UhD7D0j6ddiQz6Gb8Q_vSJOjhYI0CoXSw=s900-c-k-c0x00ffffff-no-rj" alt="traversy media logo" width=100 class="img-fluid bg-danger">
                <h3 class="pt-3">Feedback</h3>
                <p class="fs-5 pt-1">Leave feedback for Traversy Media</p>
            </div>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="d-flex flex-column justify-content-center col-10 col-md-8 col-lg-4 mx-auto">
            <div class="d-flex flex-column mb-3">
            <label for="name" class="pb-2 fw-semibold">Name</label> 
            <input type="text" placeholder="Enter your name" id="name" name="name" class="p-1 form-control <?php echo !empty($nameErr)?'is-invalid':null?>">
            <div class="invalid-feedback"><?php echo $nameErr?></div>
            </div>
            <div class="d-flex flex-column mb-3">
            <label for="email" class="pb-2 fw-semibold">Email</label>
            <input type="email" placeholder="Enter your email" id="email" name="email" class="p-1 form-control <?php echo !empty($emailErr)?'is-invalid':null?>">
            <div class="invalid-feedback"><?php echo $emailErr?></div>
            </div>
            <div class="d-flex flex-column mb-4">
            <label for="feedback" class="pb-2 fw-semibold">Feedback</label>
            <textarea name="feedback" id="feedback" placeholder="Enter your feedback" cols="30" rows="3" class="p-1 form-control <?php echo !empty($bodyErr)?'is-invalid':null?>"></textarea>
            <div class="invalid-feedback"><?php echo $bodyErr?></div>
            </div>
            <input type="submit" name="submit" value="Send" class="bg-dark text-white py-1">
        </form>
<?php include 'inc/footer.php'?>