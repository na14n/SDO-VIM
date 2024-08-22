<div class="table-responsive h-full">
    <table class="table table-striped">
        <thead>
            <th class="w-[5ch]">ID</th>
            <th>Username</th>
            <th class="w-[12ch]">Role</th>
            <th>School</th>
            <th>Contact Name</th>
            <th class="w-[16ch]">Mobile Number</th>
            <th class="w-[24ch]">Email</th>
            <th class="w-[12ch]">Date Added</th>
            <th class="w-[12ch]">Date Modified</th>
            <th class="w-[12ch]">Actions</th>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['user_id']) ?></td>
                    <td><?= htmlspecialchars($user['user_name']) ?></td>
                    <td><?= htmlspecialchars($user['role']) ?></td>
                    <td><?= htmlspecialchars($user['school']) ?></td>
                    <td><?= htmlspecialchars($user['contact_name']) ?></td>
                    <td><?= htmlspecialchars($user['contact_no']) ?></td>
                    <td><?= htmlspecialchars($user['contact_email']) ?></td>
                    <td><?= htmlspecialchars(formatTimestamp($user['date_added'])) ?></td>
                    <td><?= htmlspecialchars(formatTimestamp($user['date_modified'])) ?></td>
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
</div>