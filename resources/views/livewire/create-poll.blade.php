<div>
    <form wire:submit.prevent="submitForm">
        <label>Poll title</label>

        <input type="text" wire:model.live="title">


        <button class="btn mt-4 mb-4">Submit</button>
    </form>

    <div>
        @foreach ($options as $index => $option)
            <h2>
                {{$index}} - {{ $option }}
            </h2>
        @endforeach
    </div>
</div>
