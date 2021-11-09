<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" name="This is the register page of FutureSeekers.lk, New users can register themselves to the site, Both employers and applicants can register here">
    <style>
      body {
        font-family: Georgia, serif;
        background-color: #033417;
        padding: 0;
        margin: 0;
      }
      #header {
        padding-left: 225px;
        color: white;
      }
      .pagepanel {
        width: 70%;
        height: 650px;
        margin: auto;
        margin-top: 20px;
        background-color:  #C7EAD5;
        align-content: center;
        text-align: center;
        border-radius: 20px;
      }
      .grid {
        display: grid;
        grid-template-columns: 1.5fr 2fr;
        grid-template-rows: 1fr;
        grid-column-gap: 0px;
        grid-row-gap: 0px;
      }
      .formpanel {
        grid-area: 1 / 1 / 2 / 2;
        text-align: left;
        align-content: center;
        margin: 10px;
        padding: 0px 0px 20px 25px;
      }
      input[type=text], input[type=email], input[type=password], input[type=date], input[type=tel] {
        margin-bottom: 5px;
        height: 20px;
        width: 250px;
        border-radius: 10px;
      }
      .note {
        grid-area: 1 / 2 / 2 / 3;
        align-content: center;
        text-align: justify;
        padding: 0px 20px 0px 20px;
        margin-top: 135px;
      }
      .companynote, .applicantnote {
        margin-bottom: 20px;
        padding: 10px;
        border: solid #033417 2px;
        border-radius: 5px;
      }
      button {
        background-color: #5FCB8D;
        color: black;
        cursor: pointer;
        border: 3px;
        padding: 10px;
        border-radius: 10px;
        width: 150px;
        margin-top: 10px;
        font-weight: bold;
      }
      button:hover {
        background-color: #033417;
        color: white;
      }
    </style>
    <title>Future Seekers.lk | Register</title>
  </head>
  <body>
    <h1 id="header">Future Seekers LK</h1>
  <div class="pagepanel">
    <div class="grid">
      <div class="formpanel"> 
        <h2>Create a New Account</h2>
        <form>
        </form>
        <div id="GroupName2Div">

            <h3>Applicant Details</h3>
            <?php if (!empty(session()->getFlashdata('success'))) : ?>
              <div> <?= session()->getFlashdata('success'); ?> </div>
            <?php endif ?>
            <form action="<?php echo site_url('/RegisterApplicant/createprofile') ?>" method="POST">
              
              <input type="text" placeholder="Full Name" name="name" id="name" value="<?= set_value('name'); ?>"><br>
              <small><?= isset($validation) ? show_validation_error($validation, 'name') : '' ?></small><br>
              
              <input type="text" placeholder="Address" name="address" id="address" value="<?= set_value('address'); ?>"><br>
              <small><?= isset($validation) ? show_validation_error($validation, 'address') : '' ?></small><br>
              
              <input type="email" placeholder="Email" name="email" id="email" value="<?= set_value('email'); ?>"><br>
              <small><?= isset($validation) ? show_validation_error($validation, 'email') : '' ?></small><br>
              
              <input type="tel" placeholder="Contact No" name="contactNo" 
              id="contactNo" value="<?= set_value('contactNo'); ?>"><br>
              <small><?= isset($validation) ? show_validation_error($validation, 'contactNo') : '' ?></small><br>
              
              <input type="date" placeholder="DOB" name="dob" id="dob" value="<?= set_value('dob'); ?>"><br>
              <small><?= isset($validation) ? show_validation_error($validation, 'dob') : '' ?></small><br>
              
              <input type="text" placeholder="Current Job Title" name="currentJobTitle" id="currentJobTitle" value="<?= set_value('currentJobTitle'); ?>"><br>
              <small><?= isset($validation) ? show_validation_error($validation, 'currentJobTitle') : '' ?></small><br>
              
              <input type="text" placeholder="Username" name="username" id="username" value="<?= set_value('username'); ?>"><br>
              <small><?= isset($validation) ? show_validation_error($validation, 'username') : '' ?></small><br>

              <input type="password" placeholder="Password" name="password" id="password" value="<?= set_value('password'); ?>"><br>
              <small><?= isset($validation) ? show_validation_error($validation, 'password') : '' ?></small><br>
              
              <button type="submit">Register Now</button>
            </form>
        </div>
      </div>
      <div class="note">
        <div class="applicantnote">
          <p>
            Note - Applicant<br>
            After Registration, Our Team will verify your profile within 24 hours and would send you a mail regarding your profile status.
          </p>
        </div>
      </div>
    </div>
  </div>

    <?php
    
    ?>
  </body>

</html>