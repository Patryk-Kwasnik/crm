@props(['config' => [], 'data' => [], 'optionsView' => ''])

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                @foreach ($config as $column)
                    <th class="{{ $column['class'] ?? '' }}">{{ __($column['label']) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @if ($data->isEmpty())
                <tr>
                    <td colspan="{{ count($config) }}" class="text-center text-muted">
                        {{ __('Brak danych do wyświetlenia.') }}
                    </td>
                </tr>
            @else
                @foreach ($data as $index => $row)
                    <tr>
                        @foreach ($config as $column)
                            <td class="{{ $column['tdClass'] ?? '' }}{{ $column['name'] === 'options' ? 'col-md-2 text-truncate' : '' }}">
                                @if ($column['name'] === 'options' && $optionsView)
                                    @include($optionsView, ['row' => $row])
                                @else
                                    @php $value = data_get($row, $column['name'], '—') @endphp

                                    @if (!empty($column['isHtml']) && $column['isHtml'])
                                        {!! $value !!}
                                    @else
                                        {{ $value }}
                                    @endif
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
