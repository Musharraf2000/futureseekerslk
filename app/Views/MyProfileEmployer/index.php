<?php

use CodeIgniter\Session\Session;

// if(session()->get('user_id')== null){
//   return redirect()->to('http://localhost:8080/Home');
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" name="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/register_employerStyles.css') ?>" />
  <!-- CSS stylesheet for navigation bar -->
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/navbar.css') ?>" />

  <!-- For the Font Library -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&family=Raleway:wght@300&display=swap" rel="stylesheet">

  <!-- Scripts for Navbar -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <title>Future Seekers.lk | My Profile</title>
</head>

<body>

  <div class="header">
    <div class="menu-bar">
      <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href=""><img class="websitelogo" src="<?= base_url('Images/logo4.jpg') ?>"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="">Jobs </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('MyJobsEmployer/index') ?>">My Jobs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('PostAdvertEmployer/index') ?>">Post an Advert</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('MyProfileEmployer/index') ?>">My Profile</a>
            </li>
            <!-- Enter PHP code to check if the user is logged in or not in order to show login button -->
            <!-- <li class="nav-item">
                            <a class="nav-link btn btn btn-primary logoutbtn" href="#">Sign in / Register</a>
                        </li> -->
            <li class="nav-item">
              <!-- For blue button: btn btn-primary -->
              <a class="nav-link btn btn-danger logoutbtn" href="<?php echo site_url('Home/logout') ?>">Log out</a>
            </li>
            <!-- <li class="nav-item mobile_logout">
                            <a class="nav-link mobileloginbtn" href="#">Sign in / Register</a>
                        </li>      -->
            <li class="nav-item mobile_logout">
              <a class="nav-link mobilelogoutbtn" href="<?php echo site_url('Home/logout') ?>">Log out</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>

  <br/>

  <div class="card" style="margin-left:20px;margin-right:20px">
    <div class="card-header bg-primary" style="color:white">
      My Profile
    </div>
    <div class="card-body">
    <h5 class="card-title">Employer Details</h5>
    <!-- <p class="card-text" style="color:#787878">Click on the save changes to update your record</p> -->
    
    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
          <div style="margin-top:5px" class="alert alert-danger text-muted"> <?= session()->getFlashdata('fail'); ?> </div>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('success'))) : ?>
          <div style="margin-top:5px" class="alert alert-success text-muted"> <?= session()->getFlashdata('success'); ?> </div>
        <?php endif ?>
        <form action="<?php echo site_url('/MyProfileEmployer/editProfile') ?>" method="POST" enctype="multipart/form-data">
          <?php
          session();
          session()->regenerate();
          $user_id = session()->get('user_id');
          $EmployerM = new \App\Models\employerModel();
          $CompanyM = new \App\Models\companyModel();
          $UserAccountM = new \App\Models\userAccountModel();
          $employer_info = $EmployerM->where('user_account_id', $user_id)->first();

          $query_employer = $EmployerM->query("Select * from employer where user_account_id = $user_id");
          foreach ($query_employer->getResult() as $row) {
            $name = $row->name;
            $contactNo = $row->contactNo;
            $jobPosition = $row->jobPosition;
            $email = $row->email;
            $companyid = $row->company_id;

            $query_company = $CompanyM->query("Select * from company where id = $companyid");
            foreach ($query_company->getResult() as $row2) {
              $cname = $row2->name;
              $ccontactNo = $row2->contactNo;
              $cemail = $row2->email;

              $query_useraccount = $UserAccountM->query("Select * from user_account where id = $user_id");
              foreach ($query_useraccount->getResult() as $row3) {
                $username = $row3->username;
                $password = $row3->password;
                $status = $row3->status;
              }
            }
          }

          ?>

    
    <div class="form-row">
            <div class="form-group col-md-4">
              <label>Full Name</label>
              <input class="form-control" type="text" placeholder="Full Name" name="name" id="name" value="<?php echo $name ?>" <?php if ($status == 0) { ?> readonly <?php } ?>>
              <small class="form-text text-danger"><?= isset($validation) ? show_validation_error($validation, 'name') : '' ?></small>
            </div>
            <div class="form-group col-md-4">
              <label>Contact No</label>
              <input class="form-control" type="tel" placeholder="Contact No" name="contactNo" id="contactNo" value="<?php echo $contactNo ?>" <?php if ($status == 0) { ?> readonly <?php } ?>>
              <small class="form-text text-danger"><?= isset($validation) ? show_validation_error($validation, 'contactNo') : '' ?></small>
            </div>
            <div class="form-group col-md-4">
              <label>Current Job Position</label>
              <input class="form-control" type="text" placeholder="Job Position" name="jobPosition" id="jobPosition" value="<?php echo $jobPosition ?>" <?php if ($status == 0) { ?> readonly <?php } ?>>
              <small class="form-text text-danger"><?= isset($validation) ? show_validation_error($validation, 'jobPosition') : '' ?></small>
            </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-4">
              <label>Email</label>
              <input class="form-control" type="email" placeholder="Email" name="email" id="email" value="<?php echo $email ?>" <?php if ($status == 0) { ?> readonly <?php } ?>>
              <small class="form-text text-danger"><?= isset($validation) ? show_validation_error($validation, 'email') : '' ?></small>
      </div>
      <div class="form-group col-md-4">
              <label>Username</label>
              <input class="form-control" type="text" placeholder="Username" name="username" id="username" value="<?php echo $username ?>" <?php if ($status == 0) { ?> readonly <?php } ?>>
              <small class="form-text text-danger"><?= isset($validation) ? show_validation_error($validation, 'username') : '' ?></small>
            </div>
            <div class="form-group col-md-4">
              <label>Password</label>

              <input  class="form-control" type="password" placeholder="Password" name="password" id="password" value="<?php echo $password ?>" <?php if ($status == 0) { ?> readonly <?php } ?>>
              <small class="form-text text-danger"><?= isset($validation) ? show_validation_error($validation, 'password') : '' ?></small>
            </div>
      </div>
      <br/>
      <h5 class="card-title">Company Details</h5>
      <div class="form-row">
            <div class="form-group col-md-6">
              <label>Company Name</label>
              <input class="form-control" type="text" placeholder="Company Name" name="cname" id="cname" value="<?php echo $cname ?>" <?php if ($status == 0) { ?> readonly <?php } ?>>
              <small class="form-text text-danger"><?= isset($validation) ? show_validation_error($validation, 'cname') : '' ?></small>
            </div>
            <div class="form-group col-md-6">
              <label>Email</label>
              <input class="form-control" type="email" placeholder="Company Email" name="cemail" id="cemail" value="<?php echo $cemail ?>" <?php if ($status == 0) { ?> readonly <?php } ?>>
              <small class="form-text text-danger"><?= isset($validation) ? show_validation_error($validation, 'cemail') : '' ?></small>
            </div>
      </div>
      <div class="form-row">
            <div class="form-group col-md-6">
              <label>Contact No</label>
              <input class="form-control" type="tel" placeholder="Contact No" name="ccontactNo" id="ccontactNo" value="<?php echo $ccontactNo ?>" <?php if ($status == 0) { ?> readonly <?php } ?>>
              <small class="form-text text-danger"><?= isset($validation) ? show_validation_error($validation, 'ccontactNo') : '' ?></small>
            </div>
      
      <div class="form-group col-md-6">
              <label>Company Logo</label>
              <input class="form-control" type="file" name='logo' value="<?= set_value('logo'); ?>" <?php if ($status == 0) { ?> readonly <?php } ?> />
              <small class="form-text text-danger"><?= isset($validation) ? show_validation_error($validation, 'logo') : '' ?></small>
      </div>
    </div>
    <div class="form-row">
          <div class="form-row">
          <button type="submit" class="btn btn-primary btnlogin" <?php if ($status == 0) { ?> disabled <?php } ?>>Make Changes</button>

            <!-- <button id="loginbtn" class="btn btn-primary btnlogin">Register</button><br> -->
          </div>
    </div>
        </form>
    </div>
  </div>


  <!-- <div class="container">
    <h1>My Profile</h1>
    <div class="row">
      <?php if (!empty(session()->getFlashdata('fail'))) : ?>
        <div style="margin-top:5px" class="alert alert-danger text-muted"> <?= session()->getFlashdata('fail'); ?> </div>
      <?php endif ?>

      <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div style="margin-top:5px" class="alert alert-success text-muted"> <?= session()->getFlashdata('success'); ?> </div>
      <?php endif ?>
      <form action="<?php echo site_url('/MyProfileEmployer/editProfile') ?>" method="POST" enctype="multipart/form-data">
        <div class="col-6">
          <h3>Employer Details</h3>

          <?php
          session();
          session()->regenerate();
          $user_id = session()->get('user_id');
          $EmployerM = new \App\Models\employerModel();
          $CompanyM = new \App\Models\companyModel();
          $UserAccountM = new \App\Models\userAccountModel();
          $employer_info = $EmployerM->where('user_account_id', $user_id)->first();

          $query_employer = $EmployerM->query("Select * from employer where user_account_id = $user_id");
          foreach ($query_employer->getResult() as $row) {
            $name = $row->name;
            $contactNo = $row->contactNo;
            $jobPosition = $row->jobPosition;
            $email = $row->email;
            $companyid = $row->company_id;

            $query_company = $CompanyM->query("Select * from company where id = $companyid");
            foreach ($query_company->getResult() as $row2) {
              $cname = $row2->name;
              $ccontactNo = $row2->contactNo;
              $cemail = $row2->email;

              $query_useraccount = $UserAccountM->query("Select * from user_account where id = $user_id");
              foreach ($query_useraccount->getResult() as $row3) {
                $username = $row3->username;
                $password = $row3->password;
                $status = $row3->status;
              }
            }
          }

          ?>

          <input type="text" placeholder="Full Name" name="name" id="name" value="<?= set_value('name');
                                                                                  echo $name ?>" <?php if ($status == 0) { ?> readonly <?php } ?>><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'name') : '' ?></small><br>

          <input type="tel" placeholder="Contact No" name="contactNo" id="contactNo" value="<?= set_value('contactNo');
                                                                                            echo $contactNo ?>" <?php if ($status == 0) { ?> readonly <?php } ?>><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'contactNo') : '' ?></small><br>

          <input type="text" placeholder="Job Position" name="jobPosition" id="jobPosition" value="<?= set_value('jobPosition');
                                                                                                    echo $jobPosition ?>" <?php if ($status == 0) { ?> readonly <?php } ?>><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'jobPosition') : '' ?></small><br>

          <input type="email" placeholder="Email" name="email" id="email" value="<?= set_value('email');
                                                                                  echo $email ?>" <?php if ($status == 0) { ?> readonly <?php } ?>><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'email') : '' ?></small><br>

          <input type="text" placeholder="Username" name="username" id="username" value="<?= set_value('username');
                                                                                          echo $username ?>" <?php if ($status == 0) { ?> readonly <?php } ?>><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'username') : '' ?></small><br>

          <input type="password" placeholder="Password" name="password" id="password" value="<?= set_value('password');
                                                                                              echo $password ?>" <?php if ($status == 0) { ?> readonly <?php } ?>><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'password') : '' ?></small><br>
        </div>
        <div class="col-6">
          <h3>Company Details</h3>
          <input type="text" placeholder="Company Name" name="cname" id="cname" value="<?= set_value('cname');
                                                                                        echo $cname ?>" <?php if ($status == 0) { ?> readonly <?php } ?>><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'cname') : '' ?></small><br>

          <input type="tel" placeholder="Contact No" name="ccontactNo" id="ccontactNo" value="<?= set_value('ccontactNo');
                                                                                              echo $cemail ?>" <?php if ($status == 0) { ?> readonly <?php } ?>><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'ccontactNo') : '' ?></small><br>

          <input type="email" placeholder="Company Email" name="cemail" id="cemail" value="<?= set_value('cemail');
                                                                                            echo $cemail ?>" <?php if ($status == 0) { ?> readonly <?php } ?>><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'cemail') : '' ?></small><br>

          <label for='proimg'>Upload picture</label><br>
          <input type="file" name='logo' value="<?= set_value('logo'); ?>" <?php if ($status == 0) { ?> readonly <?php } ?> /><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'logo') : '' ?></small><br>
        </div>
        <button type="submit" class="btn btn-primary btnlogin" <?php if ($status == 0) { ?> disabled <?php } ?>>Make Changes</button>
      </form>
    </div>
  </div> -->

</body>

</html>