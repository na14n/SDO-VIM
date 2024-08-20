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
        <button class="flex items-center w-fit shrink-0 px-3 py-2 rounded shadow-md bg-blue-500 text-white gap-2 font-bold">
            <i class="bi bi-file-earmark-ruled-fill"></i>
            <p>Export Users</p>
        </button>
    </section>
    <section class="table-responsive h-dvh mx-12 mb-12 bg-zinc-50 rounded border-[1px]">
        <table class="table table-striped">
            <thead>
                <th class="w-[10ch]">ID</th>
                <th>Username</th>
                <th>School</th>
                <th>Contact Name</th>
                <th class="w-[16ch]">Mobile Number</th>
                <th class="w-[24ch]">Email</th>
                <th class="w-[16ch]">Date Added</th>
                <th class="w-[16ch]">Date Modified</th>
                <th class="w-[16ch]">Actions</th>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['user_id']) ?></td>
                        <td><?= htmlspecialchars($user['user_name']) ?></td>
                        <td><?= htmlspecialchars($user['school']) ?></td>
                        <td><?= htmlspecialchars($user['contact_name']) ?></td>
                        <td><?= htmlspecialchars($user['contact_no']) ?></td>
                        <td><?= htmlspecialchars($user['contact_email']) ?></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="h-full w-full flex items-center gap-2">
                                <button class="view-btn">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>
<?php require base_path('views/partials/footer.php') ?>