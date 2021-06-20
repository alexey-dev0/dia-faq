<div>
    <ul class="flex justify-center items-center mb-4 shadow">
        @foreach( $tabs as $key => $tab )
            <li wire:key="tab-{{ $key }}"
                class="{{ $this->getTabCss($key) }}"
                wire:click="select('{{ $key }}')"
            >{{ $tab['name'] }}</li>
        @endforeach
    </ul>
    <div class="p-6">
        @foreach( $tabs as $key => $tab )
            @if( $key === $selected )
                {!! $this->getView($key) !!}
            @endif
        @endforeach
    </div>
</div>
