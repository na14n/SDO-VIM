<!-- Modal Button -->

<button class="flex items-center w-fit shrink-0 px-3 py-2 rounded shadow-md bg-blue-600 text-white gap-2 font-bold" data-bs-toggle="modal" data-bs-target="#importSchoolModal">
    <i class="bi bi-upload"></i>
    <p>Import Schools</p>
</button>

<!-- Modal -->

<main class="modal fade " id="importSchoolModal" tabindex="-1" aria-labelledby="importSchoolLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered w-1/2">
        <div class="modal-content">
            <div class="modal-body h-fit flex flex-col gap-2">
                <div class="modal-header mb-4">
                    <div class="flex gap-2 justify-center items-center text-blue-600 text-xl">
                        <i class="bi bi-file-earmark-arrow-up-fill"></i>
                        <h1 class="modal-title fs-5 font-bold" id="importSchoolLabel">Import School</h1>
                    </div>
                    <button type="button" class="btn-close hover:text-red-500" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div>
                    Download and Fill-Up the Provided Form <br>
                    <span style="font-size: 0.8em; color: red;">Upload the Provided Form Only</span>
                </div>



                <div class="modal-footer mt-4 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <span>Download The School Form</span>
                        <a href="/uploads/export_with_letterhead" style="color: blue;" class="btn p-0 text-blue-500 underline">HERE</a>
                    </div>
                    <form action="/coordinator/schools/importcsv" method="POST" enctype="multipart/form-data">
                        Upload The Form Below:
                        <div class="mb-3 flex items-center gap-2">
                            <input class="form-control" type="file" id="formFile" name="uploadedForm">
                            <button type="submit" class="btn font-bold text-white bg-blue-500 hover:bg-blue-400">Import</button>
                        </div>
                    </form>

                    <?php if (isset($errors['import_school']['uploadedForm'])): ?>
                        <p class="error"><?= $errors['import_school']['uploadedForm'] ?></p>
                    <?php endif; ?>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            if (<?php echo json_encode(isset($errors['import_school']) &&  count($errors['import_school']) > 0); ?>) {
                                var importSchoolModal = new bootstrap.Modal(document.getElementById('importSchoolModal'));
                                importSchoolModal.show();
                            }
                        });
                    </script>

                </div>
                <div class="modal-footer mt-4">
                    <button type="button" class="btn font-bold text-[#000] hover:text-red-500 border-[1px] border-[#000] hover:border-red-500" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
</main>