@php
    $year = $data['year'];
    $month = $data['month'];
@endphp
<table>
    <thead>
        <tr>
            <th>Visitor Name</th>
            <th>Phone Number</th>
            <th>Purpose</th>
            <th>Year</th>
            <th>Month</th>
            <th>Date</th>
            <th>Entry Time</th>
            <th>Exit Time</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @php
            if ($year != 'All' && $month != 'All') {
                $data = DB::table('reception')
                    ->where([['year', '=', $year], ['month', '=', $month]])
                    ->orderBy('id', 'desc')
                    ->get();
            } elseif ($year != 'All' && $month == 'All') {
                $data = DB::table('reception')
                    ->where([['year', '=', $year]])
                    ->orderBy('id', 'desc')
                    ->get();
            } elseif ($year == 'All' && $month != 'All') {
                $data = DB::table('reception')
                    ->where([['month', '=', $month]])
                    ->orderBy('id', 'desc')
                    ->get();
            } elseif ($year == 'All' && $month == 'All') {
                $data = DB::table('reception')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            
        @endphp
        @foreach ($data as $item)
            <tr>

                <td>{{ $item->name }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->purpose }}</td>
                <td>{{ $item->year }}</td>
                <td>{{ $item->month }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->entry_time }}</td>
                <td>{{ $item->exit_time }}</td>

                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
