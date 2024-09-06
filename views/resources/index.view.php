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
      <?php require base_path('views/partials/coordinator/resources/add_resource_modal.php') ?>
      <?php require base_path('views/partials/coordinator/resources/import_resource_modal.php') ?>
   </section>
   <section class="mx-12 mb-12 inline-block grow rounded">
      <?php require base_path('views/partials/coordinator/resources/tabs.php') ?>
      <div class="table-responsive inline-block mt-4 bg-zinc-50 rounded border-[1px]">
         <table class="table table-striped m-0 ">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Item Article</th>
                  <th>School</th>
                  <th>Status</th>
                  <th>Date Acquired</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody class="oveflow-y-scroll">
               <?php foreach ($resources as $resource): ?>
                  <tr>
                     <td><?= htmlspecialchars($resource['item_code']) ?></td>
                     <td><?= htmlspecialchars($resource['item_article']) ?></td>
                     <td><?= htmlspecialchars($resource['school_name'] ?? 'Unassigned') ?></td>
                     <td><?= htmlspecialchars($statusMap[$resource['status']]) ?></td>
                     <td><?= htmlspecialchars(formatTimestamp($resource['date_acquired'])) ?></td>
                     <td>
                        <div class="h-full w-full flex items-center gap-2">
                           <button class="view-btn">
                              <i class="bi bi-eye-fill"></i>
                           </button>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
            <tfoot class="overflow-hidden">
               <tr>
                  <td colspan="6" class="py-2 pr-4">
                     <div class="w-full flex items-center justify-end gap-2">
                        <p class="grow text-end mr-2">Page - <?= htmlspecialchars($pagination['pages_current']) ?> / <?= htmlspecialchars($pagination['pages_total']) ?></p>
                        <a
                           href="/coordinator/resources?page=1"
                           class="pagination-link">
                           <i class="bi bi-chevron-bar-left"></i>
                        </a>
                        <a
                           href="/coordinator/resources?page=<?= htmlspecialchars($pagination['pages_current'] <= 1 ? 1 : $pagination['pages_current'] - 1) ?>" class="pagination-link">
                           <i class="bi bi-chevron-left"></i>
                        </a>
                        <a href="/coordinator/resources?page=<?= htmlspecialchars($pagination['pages_current'] >= $pagination['pages_total'] ? $pagination['pages_total'] : $pagination['pages_current'] + 1) ?>"
                           class="pagination-link">
                           <i class="bi bi-chevron-right"></i>
                        </a>
                        <a href="/coordinator/resources?page=<?= htmlspecialchars($pagination['pages_total']) ?>"
                           class="pagination-link">
                           <i class="bi bi-chevron-bar-right"></i>
                        </a>
                     </div>
                  </td>
               </tr>
            </tfoot>
         </table>
      </div>
   </section>
</main>

<?php require base_path('views/partials/footer.php') ?>