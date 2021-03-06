 <?php require (APPROOT. '\views\includes\header.php'); ?>
 <div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
             <h2>create an Account</h2>
             <p>Please Fill Out this Form To Register With Us</p>
                    <form method="POST" action="<?php echo URLROOT; ?>/users/register">
                        <div class="form-group">
                            <label for="name">Name: <sup>*</sup></label>
                            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? 'is-invalid' : '';?>" value="<?php $data['name']; ?>" />
                            <span><?php echo $data['name_error']; ?></span>
                        </div>
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
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                            <input type="text" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : '';?>" value="<?php $data['confirm_password']; ?>" />
                            <span><?php echo $data['confirm_password_error']; ?></span>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Register" class="btn btn-success btn-block">
                            </div>
                            <div class="col">
                                <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-success btn-block">Have an account? login </a>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
 </div>
  <?php require (APPROOT. '\views\includes\footer.php'); ?>