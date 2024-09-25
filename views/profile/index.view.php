<?php $page_styles = ['/css/banner.css'];
require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/sidebar.php') ?>
<?php require base_path('views/components/text-input.php') ?>
<?php require base_path('views/components/select-input.php') ?>
<?php require base_path('views/components/radio-group.php') ?>


<!-- Your HTML code goes here -->

<main class="main-col">
   <section class="flex items-center pr-12 gap-3">
      <?php require base_path('views/partials/banner.php') ?>
      <?php foreach ($userInfo as $info): ?>
      <?php require base_path('views/partials/custodian/profile/edit_request_modal.php') ?>
   </section>
   <section class="h-dvh mx-12 mb-12 bg-zinc-50 rounded border-[1px]">
        <div class="box-area shadow-lg p-3 mb-5 bg-white rounded">
        <div class="single-box">
            <div class="img-area">
            <img src="https://depedvalenzuela.com/wp-content/uploads/2024/03/DO-LOGO.png" alt="SDO Logo">
            </div>
            <div class="img-text">
            <h1><span class="header-text"><strong>Custodian Name</strong></span></h1>
            <h1><?php echo $info['user_name']; ?></h1>
            <h1><span class="header-text"><strong>Assigned School</strong></span></h1>
            <h1><?php echo $info['school_name']; ?></h1>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
   </section>
</main>
<?php require base_path('views/partials/footer.php') ?>