<!-- Modal Button -->

<button class="edit-btn" data-bs-toggle="modal" data-bs-target="#editUser<?php echo $user['user_id']; ?>">
    <i class="bi bi-pencil-fill"></i>
</button>

<!-- Modal -->
<main class="modal fade " id="editUser<?php echo $user['user_id']; ?>" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered w-1/2">
        <div class="modal-content">
            <form action="/coordinator/users/edit" method="POST" class="modal-body h-fit flex flex-col gap-2">
            <input name="_method" value="PATCH" hidden />
            <input name="id_to_update" value = "<?php echo $user["user_id"]; ?>" hidden />
                <div class="modal-header mb-4">
                    <div class="flex gap-2 justify-center items-center text-green-600 text-xl">
                        <i class="bi bi-person-fill-add"></i>
                        <h1 class="modal-title fs-5 font-bold" id="addSchoolModalLabel">Edit <?= $user['user_name'] ?? 'User' ?></h1>
                    </div>
                    <button type="button" class="btn-close hover:text-red-500" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div>
                    <?php text_input('Username', 'user_name', $user['user_name'] ?? 'username') ?>
                </div>
                <div class="w-fit mb-1">
                    <?php
                    radio_group(
                        'User Role',
                        'school_type',
                        [
                            1 => 'Coordinator',
                            2 => 'Custodian',
                        ],
                        $user['user_role'] ?? 2
                    );
                    ?>
                </div>
                <?php text_input('Contact Name', 'contact_name', $user['contact_name'] ?? 'contact name') ?>
                <div class="flex items-center gap-2">
                    <span class="w-[15ch]">
                        <?php text_input('Contact Number', 'contact_no', $user['contact_no'] ?? '09XX XXX XXXX') ?>
                    </span>
                    <span class="w-full">
                        <?php text_input('Contact Email', 'contact_email', $user['contact_email'] ?? 'contact@email.me') ?>
                    </span>
                </div>
                <div class="modal-footer mt-4">
                    <button type="button" class="btn font-bold text-[#000] hover:text-red-500 border-[1px] border-[#000] hover:border-red-500" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn font-bold text-white bg-green-500 hover:bg-green-400">Save Changes</button>
                </div>
            </form>

        </div>
    </div>
</main>