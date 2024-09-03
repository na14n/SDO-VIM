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
      <?php require base_path('views/partials/custodian/custodian-inventory/add_item_modal.php') ?>
      <?php require base_path('views/partials/coordinator/schools/export_school_modal.php') ?>
   </section>
   <section class="table-responsive h-dvh mx-12 mb-12 bg-zinc-50 rounded border-[1px]">
      <table class="table table-striped">
         <thead>
            <th>Item Code</th>
            <th>Article</th>
            <th>Description</th>
            <th>Date Acquired</th>
            <th>Status</th>
            <th>Source of Funds</th>
            <th>Unit Value</th>
            <th>Qty.</th>
            <th>Total Value</th>
            <th>Active</th>
            <th>Inactive</th>
            <th>Last Updated</th>
            <th>Action</th>
         </thead>
         <tbody>
         <?php foreach ($items as $item): ?>
               <tr>
                    <td><?= htmlspecialchars($item['item_code']) ?></td>
                    <td><?= htmlspecialchars($item['item_article']) ?></td>
                    <td><?= htmlspecialchars($item['item_desc']) ?></td>
                    <td><?= htmlspecialchars($item['date_acquired']) ?></td>
                    <td><?= htmlspecialchars($item['item_status']) ?></td>
                    <td><?= htmlspecialchars($item['item_funds_source']) ?></td>
                    <td><?= htmlspecialchars($item['item_unit_value']) ?></td>
                    <td><?= htmlspecialchars($item['item_quantity']) ?></td>
                    <td><?= htmlspecialchars($item['item_total_value']) ?></td>
                    <td><?= htmlspecialchars($item['item_active']) ?></td>
                    <td><?= htmlspecialchars($item['item_inactive']) ?></td>
                    <td>
                        <?php 
                           foreach ($histories as $history):
                              if ($history['item_code'] == $item['item_code']) {
                                 echo htmlspecialchars($history['action'] . ' by ' . $history['user_name'] . ' on ' . $history['modified_at']);
                              }
                           endforeach;
                        ?>
                     </td>
                <td>
                     <div class="h-full w-full flex items-center gap-2">
                        <?php require base_path('views/partials/custodian/custodian-inventory/edit_item_modal.php') ?>
                        <?//php require base_path('views/partials/coordinator/school-inventory/edit_item_modal.php') ?>
                     </div>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </section>
</main>
<?php require base_path('views/partials/footer.php') ?>