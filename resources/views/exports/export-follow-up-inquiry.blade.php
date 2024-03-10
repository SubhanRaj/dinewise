<table>
    <thead>
        <tr>
            <th>Client Name</th>
            <th>Requirement</th>
            <th>Phone Number</th>
            <th>Whatsapp Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Business</th>
            <th>Website Url</th>
            <th>Source</th>
            <th>Year</th>
            <th>Month</th>
            <th>Date</th>
            <th>Follow Up Date</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @php
            $data = DB::table('inquiry')
                ->where('status', '=', 'FOLLOWUP')
                ->orderBy('id', 'desc')
                ->get();
            
        @endphp
        @foreach ($data as $item)
            <tr>

                <td>{{ $item->client_name }}</td>
                <td>{{ $item->req }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->whatsapp }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->business }}</td>
                <td>{{ $item->website }}</td>
                <td>{{ $item->source }}</td>
                <td>{{ $item->year }}</td>
                <td>{{ $item->month }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->follow_up_date }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
