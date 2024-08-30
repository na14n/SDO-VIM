<?php $page_styles = ['/styles/banner.css'];
require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/sidebar.php') ?>
<?php require base_path('views/components/text-input.php') ?>
<?php require base_path('views/components/select-input.php') ?>
<?php require base_path('views/components/radio-group.php') ?>


<!-- Your HTML code goes here -->

<main class="main-col">
   <section class="flex items-center pr-12 gap-3">
      <?php require base_path('views/partials/banner.php') ?>
      <?php require base_path('views/partials/coordinator/schools/add_school_modal.php') ?>
      <?php require base_path('views/partials/coordinator/schools/export_school_modal.php') ?>
   </section>
   <section class="table-responsive h-dvh mx-12 mb-12 bg-zinc-50 rounded border-[1px]">
      <table class="table table-striped">
         <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Division</th>
            <th>District</th>
            <th>Contact Name</th>
            <th>Contact Number</th>
            <th>Contact Email</th>
            <th>Date Added</th>
            <th>Actions</th>
         </thead>
         <tbody>
            <?php foreach ($schools as $school): ?>
               <tr>
                  <td><?= htmlspecialchars($school['school_id']) ?></td>
                  <td><?= htmlspecialchars($school['school_name']) ?></td>
                  <td style="text-transform: capitalize;"><?= htmlspecialchars($school['type']) ?></td>
                  <td><?= htmlspecialchars($school['division']) ?></td>
                  <td><?= htmlspecialchars($school['district']) ?></td>
                  <td><?= htmlspecialchars($school['contact_name']) ?></td>
                  <td><?= htmlspecialchars($school['contact_no']) ?></td>
                  <td><?= htmlspecialchars($school['contact_email']) ?></td>
                  <td><?= htmlspecialchars(formatTimestamp($school['date_added'])) ?></td>
                  <td>
                     <div class="h-full w-full flex items-center gap-2">
                        <?php require base_path('views/partials/coordinator/schools/view_receipt_modal.php') ?>
                        <?php require base_path('views/partials/coordinator/schools/edit_school_modal.php') ?>
                        <?php require base_path('views/partials/coordinator/schools/delete_school_modal.php') ?>
                     </div>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </section>
</main>
<?php require base_path('views/partials/footer.php') ?>