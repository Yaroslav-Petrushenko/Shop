<?php require_once(__DIR__ . '/../../templates/header.php'); ?>

<div class="contacts" id="contact">
    <h2>Log In</h2>
    <p class="info"></p>
    <div class="container-form wrapper">
        <form action="" class="flex flex-column" id="form" method="post" autocomplete="off">
            <input type="email" value='<?= $_POST['email'] ?? '' ?>' name="email"  placeholder="Your email" class="input" id="email">
            
            <input type="password" value='<?= $_POST['password'] ?? '' ?>' name="password"  placeholder="Password" class="input" id="password">   
            <div class="btn-section ">
                <button class="btn-form" type="submit">Log In</button>
            </div>   
            <div class="btn-section">
                <a href="" class="btn-form registr" type="submit">Sign In</a>
            </div>   
        </form>
    </div>
</div>
