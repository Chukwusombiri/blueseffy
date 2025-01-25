<div class="bg-slate-200 text-slate-700">   
    <div class="w-75 mx-auto py-4">
        <p>This action cannot be reversed once performed.<br>Are you sure you want to delete member?</p>
        <div class="flex flex-row justify-end w-3/4 mx-auto p-2">
            <button class="btn btn-secondary" wire:click="$emit('closeModal')">cancel</button>
            <button class="btn btn-info ml-3" wire:click="deleteMember">yes</button>
        </div>
    </div>
</div>