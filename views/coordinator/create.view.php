<?php $page_styles = ['/styles/banner.css'];
require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/sidebar.php') ?>
<?php require base_path('views/components/dashboard-card.php') ?>


<!-- Your HTML code goes here -->

<main class="main-col">
   <?php require base_path('views/partials/banner.php') ?>
   <section class="mx-6 py-6 px-12 flex gap-8">
      <?php dashboard_card('Total Equipments', '5'); ?>
      <?php dashboard_card('Working', '2', 'bi-patch-check-fill'); ?>
      <?php dashboard_card('For Repair', '2', 'bi-tools'); ?>
      <?php dashboard_card('Condemned', '1', 'bi-exclamation-diamond-fill'); ?>
   </section>
</main>

<?php require base_path('views/partials/footer.php') ?>