<!-- Modal Button -->

<button class="flex items-center w-fit shrink-0 px-3 py-2 rounded shadow-md bg-green-500 text-white gap-2 font-bold hover:bg-green-600" data-bs-toggle="modal" data-bs-target="#addSchoolModal">
    <i class="bi bi-building-fill-add"></i>
    <p>Add new School</p>
</button>

<!-- Modal -->

<main class="modal fade " id="addSchoolModal" tabindex="-1" aria-labelledby="addSchoolModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered w-1/2">
        <div class="modal-content">
            <form action="/coordinator/schools/store" method="POST" class="modal-body h-fit flex flex-col gap-2">
                <div class="modal-header mb-4">
                    <div class="flex gap-2 justify-center items-center text-green-600 text-xl">
                        <i class="bi bi-building-fill-add"></i>
                        <h1 class="modal-title fs-5 font-bold" id="addSchoolModalLabel">Add New School</h1>
                    </div>
                    <button type="button" class="btn-close hover:text-red-500" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-[12ch]">
                        <?php text_input('School ID', 'school_id', 'School ID') ?>
                    </span>
                    <span class="w-full">
                        <?php text_input('School Name', 'school_name', 'School Name') ?>
                    </span>

                </div>
                <div class="flex items-center gap-2 p-0 m-0">
                    <div class="w-fit">
                        <?php
                        radio_group(
                            'Type of School',
                            'school_type',
                            [
                                1 => 'Public',
                                2 => 'Private',
                            ],
                            1
                        );
                        ?>
                    </div>
                    <span class="w-full">
                        <?php
                        select_input(
                            'School Division',
                            'school_division',
                            'school_division',
                            [
                                1 => 'DCS Valenzuela',
                            ],
                            1
                        );
                        ?>
                    </span>
                </div>
                <div class="w-full">
                    <?php
                    select_input(
                        'School District',
                        'school_district',
                        'school_district',
                        [
                            1 => 'Congressional I',
                            2 => 'Congressional II',
                        ],
                        1
                    );
                    ?>
                </div>
                <?php text_input('School Contact', 'contact_name', 'Contact Name') ?>
                <div class="flex items-center gap-2">
                    <span class="w-[15ch]">
                        <?php text_input('Contact Number', 'contact_no', '09XX XXX XXXX') ?>
                    </span>
                    <span class="w-full">
                        <?php text_input('Contact Email', 'contact_email', 'contact@email.me') ?>
                    </span>
                </div>
                <div class="modal-footer mt-4">
                    <button type="button" class="btn font-bold text-[#000] hover:text-red-500 border-[1px] border-[#000] hover:border-red-500" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn font-bold text-white bg-green-500 hover:bg-green-400">Add New School</button>
                </div>
            </form>
        </div>
    </div>
</main>