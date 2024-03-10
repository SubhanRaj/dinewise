<table>
    <thead>
        <tr>
            <th style="font-weight:bold">Name</th>
            <th style="font-weight:bold">Phone</th>
            <th style="font-weight:bold">Email</th>
            <th style="font-weight:bold">Date Of Birth</th>
            <th style="font-weight:bold">Date Of Anniversary</th>
            <th style="font-weight:bold">Status</th>
            <th style="font-weight:bold">Created At</th>
            <th style="font-weight:bold">Updated At</th>
        </tr>
    </thead>
    <tbody>
        @php
            $data = DB::table('customers')
                ->orderBy('id', 'desc')
                ->get();
            
        @endphp
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->dob }}</td>
                <td>{{ $item->doa }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
