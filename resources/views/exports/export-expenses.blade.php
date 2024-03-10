@php
    $year = $data['year'];
    $month = $data['month'];
@endphp
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Year</th>
            <th>Month</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @php
            
            if ($year != 'All' && $month != 'All') {
                $data = DB::table('expenses')
                    ->where([['year', '=', $year], ['month', '=', $month]])
                    ->orderBy('id', 'desc')
                    ->get();
            } elseif ($year != 'All' && $month == 'All') {
                $data = DB::table('expenses')
                    ->where([['year', '=', $year]])
                    ->orderBy('id', 'desc')
                    ->get();
            } elseif ($year == 'All' && $month != 'All') {
                $data = DB::table('expenses')
                    ->where([['month', '=', $month]])
                    ->orderBy('id', 'desc')
                    ->get();
            } elseif ($year == 'All' && $month == 'All') {
                $data = DB::table('expenses')
                    ->orderBy('id', 'desc')
                    ->get();
            }
        @endphp
        @foreach ($data as $item)
            <tr>

                <td>{{ $item->title }}</td>
                <td>{{ $item->year }}</td>
                <td>{{ $item->month }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->amount }}</td>
                <td>{{ $item->description }}</td>

                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
