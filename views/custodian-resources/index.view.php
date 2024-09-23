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
         <div class="sort1">
         <div class="select">
         <span class="selected">Sort by</span>
            <div class="caret"></div>
         </div>
         <ul class="menu">
            <li>Item Article</li>
            <li>Date Acquired</li>
         </ul>
      </div>
      <div class="table-responsive h-full mt-4 bg-zinc-50 rounded border-[1px]">
         <table class="table table-striped">
            <thead>
               <th>ID</th>
               <th>Item Article</th>
               <th>School</th>
               <th>Status</th>
               <th>Date Acquired</th>
               <th>Actions</th>
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

<script>  
   const dropdowns = document.querySelectorAll('.sort1');

   dropdowns.forEach(sort1 => {

      const select =sort1.querySelector('.select');
      const caret =sort1.querySelector('.caret');
      const menu =sort1.querySelector('.menu');
      const options =sort1.querySelector('.menu li');
      const selected =sort1.querySelector('.selected');

      select.addEventListener('click', () => {
      
         select.classList.toggle('select-clicked');
         caret.classList.toggle('caret-rotate');
         menu.classList.toggle('menu-open');
      });

      

   options.forEach(option => {

      option.addEventListener('click', () => {

         selected.innerText = option.innerText;
         select.classList.remove('select-clicked');
         caret.classList.remove('caret-rotate');
         menu.classList.remove('menu-open');
         options.forEach(option => {
            option.classList.remove('active');
         });
         option.classList.add('active');
      });   
   });
});
</script> 