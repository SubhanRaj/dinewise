<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>UID</th>
            <th>Leave From</th>
            <th>Leave To</th>
            <th>Description</th>
            <th>Year</th>
            <th>Month</th>
            <th>Date</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @php
            $data = DB::table('leaves')
                ->orderBy('id', 'desc')
                ->get();
        @endphp
        @foreach ($data as $item)
            @php
                $staffData = getStaffDetailsUsingUid($item->uid);
            @endphp
            <tr>
                <td>{{ $staffData[0]->name }}</td>
                <td>{{ $item->uid }}</td>
                <td>{{ $item->l_from }}</td>
                <td>{{ $item->l_to }}</td>
                <td>{{ $item->des }}</td>
                <td>{{ $item->year }}</td>
                <td>{{ $item->month }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
