@props([
    'value',
    'data'
])
    <!-- Left Side -->
    <div class="k_inner_group col-md-6 col-lg-6">
        <!-- separator -->
        <div class="g-col-sm-2">

            <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                    {{ $value->label }}
            </div>
        </div>
            @foreach($this->inputs() as $input)
                @if($input->group == $value->key)
                    <x-dynamic-component
                        :component="$input->component"
                        :value="$input"
                    >
                    </x-dynamic-component>
                @endif
            @endforeach

    </div>


