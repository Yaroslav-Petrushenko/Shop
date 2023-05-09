<?php require_once(__DIR__ . '/../../templates/header.php'); ?>

<div class="contacts" id="contact">
    <h2>Sign Up</h2>
    <p class="info"></p>
    <div class="container-form wrapper">
        <form action="" class="flex flex-column" id="form" method="post" autocomplete="off">
            <input class="input <?= $errors ? 'err-input' : '' ?>" type="text" value='' id="name" name="first_name" placeholder="Your name"> 
            <input class="input <?= $errors ? 'err-input' : '' ?>" type="text" value='' id="name" name="last_name" placeholder="Your last-name"> 
            <input type="text" value='' name="email"  placeholder="Your email" class="input <?= $errors ? 'err-input' : '' ?>" id="email">
            <input type="password" value='' name="password"  placeholder="Password" class="input <?= $errors ? 'err-input' : '' ?>" id="password">
            <input type="number" value='' name="phone"  placeholder="Your phone" class="input <?= $errors ? 'err-input' : '' ?>" id="phone">
            <input type="text" value='' name="status"  placeholder="Status" class="input <?= $errors ? 'err-input' : '' ?>" id="status">
            <div class="btn-section ">
                <button class="btn-form" type="submit">Sign Up</button>
            </div>   
        </form>
    </div>
</div>
