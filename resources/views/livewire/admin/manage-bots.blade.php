<table class="table table-striped table-hover text-nowrap">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Multiplier</th>
            <th>Duration</th>
            <th>created on</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @if (count($bots) > 0)
            @foreach ($bots as $bot)
                <tr>
                    <td>{{ $bot->name }}</td>
                    <td>${{ $bot->price }}</td>
                    <td>{{ $bot->multiplier }}</td>
                    <td>{{ $bot->duration }}</td>                    
                    <td>{{ $bot->created_at->diffForHumans() }}</td>
                    <td class="d-flex"><button wire:click='$emit("openModal","admin.edit-bot",@json([$bot->id]))'
                            class="btn  btn-sm btn-primary mr-3">EDIT</button>                        
                            <button wire:click="delete('{{$bot->id}}')" type="button" class="btn btn-sm btn-danger">
                                {{ __('DELETE') }}
                            </button>
                    </td>
            @endforeach
        @endif
    </tbody>
</table>
