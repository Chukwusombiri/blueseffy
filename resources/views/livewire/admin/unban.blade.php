<div class="bg-slate-200 text-slate-700">
    <div class="w-75 mx-auto py-4">
        <p>This member will be able to access aunthenticated user pages after this action.<br>Are you sure you want to un-ban member?</p>
        <div class="flex flex-row justify-end w-3/4 mx-auto p-2">
            <button class="btn btn-secondary rounded" wire:click="$emit('closeModal')">cancel</button>
            <button class="btn btn-info ml-3 rounded" wire:click="unbanUser">yes</button>
        </div>
    </div>
</div>
