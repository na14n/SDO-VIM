<div class="table-responsive h-full">
    <table class="table table-striped">
        <thead>
            <th class="w-[8ch]">ID</th>
            <th>Requester</th>
            <th>Request</th>
            <th class="w-[16ch]">Date Added</th>
            <th class="w-[16ch]">Date Modified</th>
            <th class="w-[16ch]">Actions</th>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
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
</div>