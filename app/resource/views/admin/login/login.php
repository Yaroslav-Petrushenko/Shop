<?php require_once(__DIR__ . '/../../templates/header.php'); ?>

<div class="contacts" id="contact">
    <h2>Log In</h2>
    <p class="info"></p>
    <div class="container-form wrapper">
        <form action="" class="flex flex-column" id="form" method="post" autocomplete="off">
            <label for="mailUser" class="label">
                <input type="mail" for="mailUser" value='' name="email"  placeholder="Your email" class="input" id="email">
            </label>
            <label for="mailUser" class="label">
                <input type="password" for="password" value='' name="password"  placeholder="Password" class="input" id="password">
            </label>
            <div class="btn-section ">
                <button class="btn-form" type="submit">Log In</button>
            </div>   
            <div class="btn-section">
                <a href="" class="btn-form registr" type="submit">Sign In</a>
            </div>   
        </form>
    </div>
</div>
