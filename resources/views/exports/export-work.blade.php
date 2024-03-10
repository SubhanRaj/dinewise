<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>UID</th>
            <th>Work Title</th>
            <th>Work Description</th>
            <th>Starting Date</th>
            <th>Deadline</th>
            <th>Year</th>
            <th>Month</th>
            <th>Date</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @php
            $data = DB::table('works')
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
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->starting_date }}</td>
                <td>{{ $item->deadline }}</td>
                <td>{{ $item->year }}</td>
                <td>{{ $item->month }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
