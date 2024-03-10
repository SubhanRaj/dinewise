<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>UID</th>
            <th>Incremented Salary</th>
            <th>Active From</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @php
            $data = DB::table('salary_increment')
                ->orderBy('id', 'desc')
                ->get();
            
        @endphp
        @foreach ($data as $item)
            @php
                $uid = $item->uid;
                $staffData = getStaffDetailsUsingUid($item->uid);
                
            @endphp
            <tr>
                <td>{{ $staffData[0]->name }}</td>
                <td>{{ $item->uid }}</td>
                <td>{{ $item->amount }}</td>
                <td>{{ $item->active_from }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
