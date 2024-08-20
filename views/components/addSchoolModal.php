<!-- Modal Button -->

<button class="flex items-center w-fit shrink-0 px-3 py-2 rounded shadow-md bg-green-500 text-white gap-2 font-bold hover:bg-green-600" data-bs-toggle="modal" data-bs-target="#addSchoolModal">
    <i class="bi bi-building-fill-add"></i>
    <p>Add new School</p>
</button>

<!-- Modal -->

<main class="modal fade " id="addSchoolModal" tabindex="-1" aria-labelledby="addSchoolModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered w-1/2">
        <div class="modal-content">
            <div class="modal-header">
                <div class="flex gap-2 justify-center items-center text-green-600 text-xl">
                    <i class="bi bi-building-fill-add"></i>
                    <h1 class="modal-title fs-5 font-bold" id="addSchoolModalLabel">Add New School</h1>
                </div>
                <button type="button" class="btn-close hover:text-red-500" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="modal-body h-fit flex flex-col gap-2">
                <div class="flex items-center gap-2">
                    <span class="w-[12ch]">
                        <span class="flex flex-col">
                            <label class="ml-2 text-xs text-zinc-500 mb-1">School ID</label>
                            <input class="p-2 outline-none rounded border-1 border-zinc-300 hover:border-zinc-400 active:border-[#434F72] focus:border-[#434F72] valid:border-[#434F72] shadow-inner" name="school_id" placeholder="School ID" required />
                        </span>
                    </span>
                    <span class="flex flex-col w-full">
                        <label class="ml-2 text-xs text-zinc-500 mb-1">School Name</label>
                        <input class="p-2 outline-none rounded border-1 border-zinc-300 hover:border-zinc-400 active:border-[#434F72] focus:border-[#434F72] valid:border-[#434F72] shadow-inner" name="school_name" placeholder="School Name" required />
                    </span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-fit">
                        <h5 class="ml-2 text-zinc-500 mb-2 text-xs">Type of School</h5>
                        <span class="flex gap-1">
                            <input type="radio" class="peer/public text-zinc-300 accent-[#434F72]" id="public" name="school_type" value="<?php echo 1; ?>" checked>
                            <label class="mr-2 peer-checked/public:text-[#434F72] text-zinc-400" for="public">Public</label>
                            <input type="radio" class="peer/private text-zinc-300 accent-[#434F72]" id="private" name="school_type" value="<?php echo 2; ?>">
                            <label class="mr-2 peer-checked/private:text-[#434F72] text-zinc-400" for="private">Private</label>
                        </span>
                    </div>
                    <div class="w-full">
                        <label for="school_division" class="ml-2 text-zinc-500 mb-1 text-xs">School Division</label>
                        <select id="school_division" name="school_division" class="flex w-full bg-white gap-1 p-2 outline-none rounded border-1 border-zinc-300 hover:border-zinc-400 active:border-[#434F72] focus:border-[#434F72] valid:border-[#434F72] active:text-[#434F72] focus:text-[#434F72] valid:text-[#434F72] shadow-inner">
                            <option type="radio" value="<?php echo 1; ?>" selected>Option 1</option>
                            <option type="radio" value="<?php echo 2; ?>">Option 2123132</option>
                        </select>
                    </div>
                </div>
                <div class="w-full">
                    <label for="school_district" class="ml-2 text-zinc-500 mb-1 text-xs">School District</label>
                    <select id="school_district" name="school_district" class="flex w-full bg-white gap-1 p-2 outline-none rounded border-1 border-zinc-300 hover:border-zinc-400 active:border-[#434F72] focus:border-[#434F72] valid:border-[#434F72] active:text-[#434F72] focus:text-[#434F72] valid:text-[#434F72] shadow-inner">
                        <option type="radio" value="<?php echo 1; ?>" selected>Option 1</option>
                        <option type="radio" value="<?php echo 2; ?>">Option 2123132</option>
                    </select>
                </div>
                <span class="flex flex-col">
                    <label class="ml-2 text-xs text-zinc-500 mb-1">School Contact</label>
                    <input class="p-2 outline-none rounded border-1 border-zinc-300 hover:border-zinc-400 active:border-[#434F72] focus:border-[#434F72] valid:border-[#434F72] shadow-inner" name="contact_name" placeholder="Contact Name" required />
                </span>
                <div class="flex items-center gap-2">
                    <div class="flex flex-col w-[15ch]">
                        <label class="ml-2 text-xs text-zinc-500 mb-1">Contact Number</label>
                        <input class="p-2 outline-none rounded border-1 border-zinc-300 hover:border-zinc-400 active:border-[#434F72] focus:border-[#434F72] valid:border-[#434F72] shadow-inner" name="contact_no" placeholder="09XX XXX XXXX" required />
                    </div>
                    <div class="flex flex-col w-full">
                        <label class="ml-2 text-xs text-zinc-500 mb-1">Contact Email</label>
                        <input class="p-2 outline-none rounded border-1 border-zinc-300 hover:border-zinc-400 active:border-[#434F72] focus:border-[#434F72] valid:border-[#434F72] shadow-inner" name="contact_email" placeholder="contact@email.me" required />
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn font-bold text-[#000] hover:text-red-500 border-[1px] border-[#000] hover:border-red-500" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn font-bold text-white bg-green-500 hover:bg-green-400">Save changes</button>
            </div>
        </div>
    </div>
</main>