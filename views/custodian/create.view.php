<?php $page_styles = ['/css/banner.css'];
require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/sidebar.php') ?>
<?php require base_path('views/components/dashboard-card.php') ?>

<!-- Your HTML code goes here -->
<main class="main-col">
   <section class="flex items-center pr-12 gap-3">
      <?php require base_path('views/partials/banner.php') ?>
      <?php require base_path('views/partials/custodian/add_receipt_modal.php') ?>
   </section>
   <section>
   <form class="search-containers search" method="POST" action="">
         <input type="text" name="search" id="search" placeholder="Search" value="<?= $search ?? '' ?>" />
         <button type="submit" class="search">
            <i class="bi bi-search"></i>
         </button>
      </form>
      <div class="dropdown1">
         <div class="select">
            <span class="selected">Filter</span>
            <div class="caret"></div>
         </div>
         <ul class="menu">
            <li>School</li>
            <li>School1</li>
            <li>School2</li>
            <li>School3</li>
         </ul>
      </div>
   </section>
   </section>
   <section class="mx-6 px-12 flex gap-6">
      <?php dashboard_card('Total Equipments', '5'); ?>
      <?php dashboard_card('Working', '2', 'bi-patch-check-fill'); ?>
      <?php dashboard_card('For Repair', '2', 'bi-tools'); ?>
      <?php dashboard_card('Condemned', '1', 'bi-exclamation-diamond-fill'); ?>
   </section>
   <section class="grow mx-12 px-6 py-6 flex flex-col gap-6 text-red-500">
      <div class="flex items-center gap-6 h-1/2">
         <div class="h-full bg-zinc-50 border-[1px] rounded-lg p-3 flex-1"><canvas id="article"></canvas></div>
         <div class="h-full bg-zinc-50 border-[1px] rounded-lg p-3 shrink-0 w-1/4"><canvas id="ratio"></canvas></div>
      </div>
      <div class="flex items-center gap-6 h-1/2">
         <div class="h-full bg-zinc-50 border-[1px] rounded-lg p-3 shrink-0 w-1/3"><canvas id="i_ratio"></canvas></div>
         <div class="h-full bg-zinc-50 border-[1px] rounded-lg p-3 flex-1"><canvas id="inventory"></canvas></div>
      </div>
   </section>
</main>

<script>
   const article_ctx = document.getElementById('article').getContext('2d');
   const article = new Chart(article_ctx, {
      type: 'bar',
      data: {
         labels: ['Mouse', 'Laptops', 'Keyboard', 'RAM Sticks', 'Desktop Sets', 'Monitors'],
         datasets: [{
            label: '# of Equipments',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
               'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
               'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
         }]
      },
      options: {
         responsive: true,
         maintainAspectRatio: false,
         scales: {
            y: {
               beginAtZero: true
            }
         },
         plugins: {
            title: {
               display: true,
               text: 'No. of Equpments per Article'
            }
         }
      }
   });
</script>
<script>
   const inventory_ctx = document.getElementById('inventory').getContext('2d');
   const inventory = new Chart(inventory_ctx, {
      type: 'bar',
      data: {
         labels: ['Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
         datasets: [{
            label: 'Inventory Received per Month',
            data: [5, 11, 9, 5, 12, 9],
            backgroundColor: [
               'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
               'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
         }]
      },
      options: {
         responsive: true,
         maintainAspectRatio: false,
         scales: {
            y: {
               beginAtZero: true
            }
         },
         plugins: {
            title: {
               display: true,
               text: 'Monthly Inventory Stock Status'
            }
         }
      }
   });
</script>
<script>
   const ratio_ctx = document.getElementById('ratio').getContext('2d');
   const ratio = new Chart(ratio_ctx, {
      type: 'pie',
      data: {
         labels: ['Working', 'Repair', 'Condemned'],
         datasets: [{
            data: [65, 20, 25],
            backgroundColor: [
               'rgba(22, 163, 72, 0.5)',
               'rgba(255, 159, 64, 0.5)',
               'rgba(255, 99, 132, 0.5)',
            ],
            borderColor: [
               'rgba(22, 163, 74, 1)',
               'rgba(255, 144, 32, 1)',
               'rgba(255, 64, 105, 1)',
            ],
            borderWidth: 1
         }]
      },
      options: {
         responsive: true,
         maintainAspectRatio: false,
         plugins: {
            title: {
               display: true,
               text: 'Inventory Status Ratio'
            }
         }
      }
   });
</script>
<script>
   const i_ratio_ctx = document.getElementById('i_ratio').getContext('2d');
   const i_ratio = new Chart(i_ratio_ctx, {
      type: 'doughnut',
      data: {
         labels: ['Mouse', 'Laptops', 'Keyboard', 'RAM Sticks', 'Desktop Sets', 'Monitors'],
         datasets: [{
            label: 'Inventory Item Ratio',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1
         }]
      },
      options: {
         responsive: true,
         maintainAspectRatio: false,
         plugins: {
            title: {
               display: true,
               text: 'Inventory Item Ratio'
            }
         }
      }
   });
</script>
<?php require base_path('views/partials/footer.php') ?>

<script>  
   const dropdowns = document.querySelectorAll('.dropdown1');

   dropdowns.forEach(dropdown1 => {

      const select =dropdown1.querySelector('.select');
      const caret =dropdown1.querySelector('.caret');
      const menu =dropdown1.querySelector('.menu');
      const options =dropdown1.querySelector('.menu li');
      const selected =dropdown1.querySelector('.selected');

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