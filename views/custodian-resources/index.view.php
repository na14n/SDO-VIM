<?php $page_styles = ['/css/banner.css'];
require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/sidebar.php') ?>


<!-- Your HTML code goes here -->

<main class="main-col">
   <section class="flex items-center pr-12 gap-3">
      <?php require base_path('views/partials/banner.php') ?>
   </section>
   <section class="mx-12 mb-12 h-dvh rounded flex flex-col">
      <?php require base_path('views/partials/custodian/custodian-resources/tabs.php') ?>
      <form class="search-container search" method="POST" action="">
         <input type="text" name="search" id="search" placeholder="Search" value="<?= $search ?? '' ?>" />
         <button type="submit" class="search">
            <i class="bi bi-search"></i>
         </button>
      </form>
      <div class="table-responsive h-full mt-4 bg-zinc-50 rounded border-[1px]">
         <table class="table table-striped">
            <thead>
            <style>
               th {
                     position: relative;
                     padding: 10px;
                     color:black;
               }
               th .dropdown {
                     display: inline-block;
                     line-height: 2rem;
                     margin-left: 5px;
               }
               th .fas {
                     margin-left: 0.5rem;
                     min-width: 100px;
               }
               .dropdown-menu {
                     min-width: 100px;
                     color:white;
               }
               .dropdown-toggle {
                  background-color: white;
                  color: black;
               }
               .dropdown-toggle:hover {
                  background-color: #434F72;
               }
               .dropdown-item:hover {
                  background-color: #434F72;
                  color: white;
               }
               .view-btn {
                  margin-left: 0rem;
               }
            </style>
            <tr>
            <th>
                ID
                <i class="fas fa-sort"></i>
                <div class="dropdown">
                    <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fas fa-sort-alpha-up"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Ascending</a>
                        <a class="dropdown-item" href="#">Descending</a>
                    </div>
                </div>
            </th>
            <th>
                Item Article
                <i class="fas fa-sort"></i>
                <div class="dropdown">
                    <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fas fa-sort-alpha-up"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Ascending</a>
                        <a class="dropdown-item" href="#">Descending</a>
                    </div>
                </div>
            </th>
            <th>
                School
                <i class="fas fa-sort"></i>
                <div class="dropdown">
                    <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fas fa-sort-alpha-up"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Ascending</a>
                        <a class="dropdown-item" href="#">Descending</a>
                    </div>
                </div>
            </th>
            <th>
                Status
                <i class="fas fa-sort"></i>
                <div class="dropdown">
                    <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fas fa-sort-alpha-up"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Ascending</a>
                        <a class="dropdown-item" href="#">Descending</a>
                    </div>
                </div>
            </th>
            <th>
                Date Acquired
                <i class="fas fa-sort"></i>
                <div class="dropdown">
                    <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fas fa-sort-alpha-up"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Ascending</a>
                        <a class="dropdown-item" href="#">Descending</a>
                    </div>
                </div>
            </th>
            <th>Actions</th>
        </tr>
            </thead>
            <tbody>
               <?php foreach ($resources as $resource): ?>
                  <tr>
                     <td><?= htmlspecialchars($resource['item_code']) ?></td>
                     <td><?= htmlspecialchars($resource['item_article']) ?></td>
                     <td><?= htmlspecialchars($resource['school_name']) ?></td>
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
                        <?php if ($pagination['pages_total'] > 1): ?>
                           <a
                              href="/custodian/resources?page=1"
                              class="pagination-link">
                              <i class="bi bi-chevron-bar-left"></i>
                           </a>
                           <a
                              href="/custodian/resources?page=<?= htmlspecialchars($pagination['pages_current'] <= 1 ? 1 : $pagination['pages_current'] - 1) ?>" class="pagination-link">
                              <i class="bi bi-chevron-left"></i>
                           </a>
                           <a href="/custodian/resources?page=<?= htmlspecialchars($pagination['pages_current'] >= $pagination['pages_total'] ? $pagination['pages_total'] : $pagination['pages_current'] + 1) ?>"
                              class="pagination-link">
                              <i class="bi bi-chevron-right"></i>
                           </a>
                           <a href="/custodian/resources?page=<?= htmlspecialchars($pagination['pages_total']) ?>"
                              class="pagination-link">
                              <i class="bi bi-chevron-bar-right"></i>
                           </a>
                        <?php endif; ?>
                     </div>
                  </td>
               </tr>
            </tfoot>
         </table>
      </div>
   </section>
</main>

<?php require base_path('views/partials/footer.php') ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>