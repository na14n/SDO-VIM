<?php $page_styles = ['/css/banner.css'];
require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/sidebar.php') ?>
<?php require base_path('views/components/dashboard-card.php') ?>


<!-- Your HTML code goes here -->

<main class="main-col">
   <section>
      <?php require base_path('views/partials/banner.php') ?>
   </section>
   <section class="mx-6 px-12 flex gap-6">
      <?php dashboard_card('Total Equipments', '5'); ?>
      <?php dashboard_card('Working', '2', 'bi-patch-check-fill'); ?>
      <?php dashboard_card('For Repair', '2', 'bi-tools'); ?>
      <?php dashboard_card('Condemned', '1', 'bi-exclamation-diamond-fill'); ?>
   </section>
   <section class="grow mx-12 px-6 py-6 mb-6 flex flex-col gap-6 text-red-500">
      <div class="flex items-center gap-6 h-1/2">
         <div class="h-full bg-zinc-50 border-[1px] rounded-lg p-3 flex-1"><canvas id="myChart"></canvas></div>
         <div class="h-full bg-zinc-50 border-[1px] rounded-lg p-3 shrink-0 w-1/4">b</div>
      </div>
      <div class="flex items-center gap-6 h-1/2">
         <div class="h-full bg-zinc-50 border-[1px] rounded-lg p-3 shrink-0 w-1/3">b</div>
         <div class="h-full bg-zinc-50 border-[1px] rounded-lg p-3 flex-1">a</div>
      </div>
   </section>
</main>
<script>
   const ctx = document.getElementById('myChart').getContext('2d');
   const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
         labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
         datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
               'rgba(255, 99, 132, 0.2)',
               'rgba(54, 162, 235, 0.2)',
               'rgba(255, 206, 86, 0.2)',
               'rgba(75, 192, 192, 0.2)',
               'rgba(153, 102, 255, 0.2)',
               'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
               'rgba(255, 99, 132, 1)',
               'rgba(54, 162, 235, 1)',
               'rgba(255, 206, 86, 1)',
               'rgba(75, 192, 192, 1)',
               'rgba(153, 102, 255, 1)',
               'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
         }]
      },
      options: {
         scales: {
            y: {
               beginAtZero: true
            }
         }
      }
   });
</script>


<?php require base_path('views/partials/footer.php') ?>