<?php $page_styles = ['/styles/banner.css'];
require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/sidebar.php') ?>


<!-- Your HTML code goes here -->

<main class="main-col">
   <?php require base_path('views/partials/banner.php') ?>
   <section class="table-responsive h-dvh m-16 bg-zinc-50 rounded border-[1px] border-zinc-300">
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
                  <td class="flex gap-2 items-center">
                     <button class="w-8 h-8 rounded bg-blue-500 p-2 text-zinc-50 flex items-center justify-center hover:bg-blue-700 transition-color ease-in-out">
                        <i class="bi bi-eye-fill"></i>
                     </button>
                     <button class="w-8 h-8 rounded bg-green-500 p-2 text-zinc-50 flex items-center justify-center hover:bg-green-700 transition-color ease-in-out">
                        <i class="bi bi-pencil-fill"></i>
                     </button>
                     <button class="w-8 h-8 rounded bg-red-500 p-2 text-zinc-50 flex items-center justify-center hover:bg-red-700 transition-color ease-in-out">
                        <i class="bi bi-trash-fill"></i>
                     </button>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </section>
</main>

<?php require base_path('views/partials/footer.php') ?>