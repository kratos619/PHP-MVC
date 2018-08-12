 <?php require (APPROOT. '\views\includes\header.php'); ?>
 <div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
        <?php flash('Register-success'); ?>
             <h2>LogIn</h2>
             <p>Please Fill Out this Form To Login  With Us</p>
                    <form method="POST" action="<?php echo URLROOT; ?>/users/login">
                        <div class="form-group">
                            <label for="email">Email: <sup>*</sup></label>
                            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : '';?>" value="<?php $data['email']; ?>" />
                            <span><?php echo $data['email_error']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">password: <sup>*</sup></label>
                            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : '';?>" value="<?php $data['password']; ?>" />
                            <span><?php echo $data['password_error']; ?></span>
                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Login" class="btn btn-success btn-block">
                            </div>
                            <div class="col">
                                <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-success btn-block">Register With Us </a>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
 </div>
  <?php require (APPROOT. '\views\includes\footer.php'); ?>