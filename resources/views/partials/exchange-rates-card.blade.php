<div class="p-3 mb-3 bg-info text-white rounded shadow">
    <h4 class="font-weight-bold">
        {{ config('aziz.currency_options.base') }} Exchange Rates
    </h4>
    <p>Get the latest foreign exchange reference rates daily.</p>

    <table class="table text-white">
        <thead>
            <tr>
                <th scope="col">Country</th>
                <th scope="col">Rate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rates as $country => $rate)
                <tr>
                    <td>{{ $country }}</td>
                    <td>{{ $rate }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>