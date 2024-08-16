<?php

// ==================================
//        File-Specific Styling
// ==================================
// By Adding a $page_styles array at
// the start of your view page. You 
// can add specific CSS files to be
// loaded in the view page.
//
// Make sure to incldue the whole
// file path inside the public folder.
// (e.g '/styles/index.css')
//
//  Also, make sure that PAGE STYLES
//  PRECEED THE INITIALIZATION OF
//  HEAD.PHP FILE
//

$page_styles = [
    '/styles/index.css',
];

// ===========================================
//             View File Structure
// ===========================================
// ALWAYS ADD THE require 'partials/head.php'
// at the top of the file and the require
// 'partials/footer.php' at the end of the
// file.
//
// You can also add other partial or UI
// components by adding its full path string
// on the base_path() function as done below.
//  

require base_path('views/partials/head.php')

?>

<!-- Your HTML code goes here -->

<main class="main">
    <div>
        <form action="/session" method="POST">

            <i class="bi bi-person-circle person"></i>
            <h4 class="font-black signin">Sign In</h4>

            <input type="text" name="username" required placeholder="your username" value="<?= old('email') ?>" class="input" style="margin-top: 2rem;" />
            <?php if (isset($errors['email'])): ?>
                <p class="error"><?= $errors['email'] ?></p>
            <?php endif; ?>

            <input type="password" name="password" required placeholder="your password" class="input" style="margin-top: 1rem;" />

            <?php if (isset($errors['password'])): ?>
                <p class="error"><?= $errors['password'] ?></p>
            <?php endif; ?>

            <a href="#" class="forgot-password">Forgot your password?</a>

            <button class="btn-signin">Log In</button>
        </form>
        <section>
            <i class="bi bi-boxes boxes"></i>
            <h2>ICT - Resource</h2>
            <h2>Inventory System</h2>
        </section>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>