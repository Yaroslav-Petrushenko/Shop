<?php require_once(__DIR__ . '/../../temlpates/header.php'); ?>

<div class="contacts" id="contact">
    <h2>Sign Up</h2>
    <p class="info"></p>
    <div class="container-form wrapper">
        <form action="" class="flex flex-column" id="form" method="post" autocomplete="off">
            <label for="userName" class="label">
                <input class="input <?= $errors ? 'err-input' : '' ?>" type="text" for="userName" value='' id="name" name="first_name" placeholder="Your name"> 
            </label>
            <label for="userLastName" class="label">
                <input class="input <?= $errors ? 'err-input' : '' ?>" type="text" for="userLastName" value='' id="name" name="last_name" placeholder="Your last-name"> 
            </label>
            <label for="email" class="label">
                <input type="text" for="mailUser" value='' name="email"  placeholder="Your email" class="input <?= $errors ? 'err-input' : '' ?>" id="email">
            </label>
            <label for="password" class="label">
                <input type="password" for="password" value='' name="password"  placeholder="Password" class="input <?= $errors ? 'err-input' : '' ?>" id="password">
            </label>
            <label for="phone" class="label">
                <input type="number" for="phoneUser" value='' name="phone"  placeholder="Your phone" class="input <?= $errors ? 'err-input' : '' ?>" id="phone">
            </label>  
            <label for="status" class="label">
                <input type="text" for="status" value='' name="status"  placeholder="Status" class="input <?= $errors ? 'err-input' : '' ?>" id="phone">
            </label>  
            <div class="btn-section ">
                <button class="btn-form" type="submit">Sign Up</button>
            </div>   
        </form>
    </div>
</div>
