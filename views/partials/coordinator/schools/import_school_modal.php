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

                <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="download-tab" data-bs-toggle="tab" data-bs-target="#download" type="button" role="tab" aria-controls="download" aria-selected="false">Download</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="upload-tab" data-bs-toggle="tab" data-bs-target="#upload" type="button" role="tab" aria-controls="upload" aria-selected="true">Upload</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="download" role="tabpanel" aria-labelledby="download-tab">
                        <form action="/coordinator/schools/importcsv" method="GET">
                            <i class="bi bi-download"></i>
                            Download
                            <button type="submit" style="color: blue;">School_Form.pdf</button>
                        </form>
                        <form action="/coordinator/schools/importcsv" method="GET">
                            <i class="bi bi-upload"></i>
                            <button type="submit" style="color: blue;">Upload School Form</button>
                        </form>
                    </div>
                    <div class="tab-pane fade show active" id="upload" role="tabpanel" aria-labelledby="upload-tab">
                        <form action="/coordinator/schools/importcsv" method="POST" enctype="multipart/form-data" class="flex flex-col items-center gap-3">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFile" name="uploadedForm">
                            </div>
                            <button type="submit" class="btn font-bold text-white bg-blue-500 hover:bg-blue-400">Upload Form</button>
                        </form>
                    </div>

                </div>

                <div class="modal-footer mt-4">
                    <button type="button" class="btn font-bold text-[#000] hover:text-red-500 border-[1px] border-[#000] hover:border-red-500" data-bs-dismiss="modal">Cancel</button>
                </div> -->

                <div class="modal-footer mt-4 flex justify-between items-center">
                    <form action="/coordinator/schools/importcsv" method="GET" class="flex items-center gap-2">
                        <span>Download The School Form</span>
                        <button type="submit" style="color: blue;" class="btn p-0 text-blue-500 underline">HERE</button>
                    </form>
                    <form action="/coordinator/schools/importcsv" method="POST" enctype="multipart/form-data">
                        Upload The Form Below:
                        <div class="mb-3 flex items-center gap-2">
                            <input class="form-control" type="file" id="formFile" name="uploadedForm">
                            <button type="submit" class="btn font-bold text-white bg-blue-500 hover:bg-blue-400">Import</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer mt-4">
                    <button type="button" class="btn font-bold text-[#000] hover:text-red-500 border-[1px] border-[#000] hover:border-red-500" data-bs-dismiss="modal">Cancel</button>
                </div>

                </form>
            </div>
        </div>
</main>