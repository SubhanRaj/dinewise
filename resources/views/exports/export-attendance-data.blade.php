@php
    $year = $data['year'];
    $month = $data['month'];
@endphp
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>UID</th>
            <th>Year</th>
            <th>Month</th>
            <th>Date</th>
            <th>Status</th>
            <th>Login</th>
            <th>Logout</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @php
            if ($year != 'All' && $month != 'All') {
                $data = DB::table('attendance')
                    ->where([['year', '=', $year], ['month', '=', $month]])
                    ->orderBy('id', 'desc')
                    ->get();
            } elseif ($year != 'All' && $month == 'All') {
                $data = DB::table('attendance')
                    ->where([['year', '=', $year]])
                    ->orderBy('id', 'desc')
                    ->get();
            } elseif ($year == 'All' && $month != 'All') {
                $data = DB::table('attendance')
                    ->where([['month', '=', $month]])
                    ->orderBy('id', 'desc')
                    ->get();
            } elseif ($year == 'All' && $month == 'All') {
                $data = DB::table('attendance')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            
        @endphp
        @foreach ($data as $item)
            @php
                $uid = $item->uid;
                $staffData = getStaffDetailsUsingUid($item->uid);
            @endphp
            <tr>
                <td>{{ $staffData[0]->name }}</td>
                <td>{{ $item->uid }}</td>
                <td>{{ $item->year }}</td>
                <td>{{ $item->month }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->login }}</td>
                <td>{{ $item->logout }}</td>
                <td>{{ $item->created_at }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
