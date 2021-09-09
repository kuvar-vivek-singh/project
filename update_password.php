<?php
if(!isset($_SESSION["email"])){
    header("location:index.php");
}
?>
<div class="container-fluid d-flex justify-content-center">
        <div class="">
        <?php
        ?>
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="text-center text-primary">Update Your Password ?</h3>
                </div>
                <div class="card-body">
                    <div class="text-muted">
                        <ul>
                            <li>Password should be greater then 8 charecter</li>
                            <li>Password must have one special char.</li>
                            <li>At least one Capital latters</li>
                            <li>At least one small latters</li>
                        </ul>
                    </div>
                    <br>
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-lg" id="email" placeholder="Enter password"
                                    name="email" required>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-lg" id="email" placeholder="Enter confirm password"
                                    name="email" required>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block " name="submit">Update
                            Password</button>
                    </form>
                </div>
                <div class="card-footer"><small> You should know our privacy Policy <a href="#"> Read Now</a></small>
                </div>
            </div>
        </div>
    </div>