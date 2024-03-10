<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>UID</th>
            <th>Paid Amount</th>
            <th>Rest Amount</th>
            <th>Method</th>
            <th>Transaction Id</th>
            <th>DateTime</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @php
            $data = DB::table('released_payment')
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
                <td>{{ $item->paid_amount }}</td>
                <td>{{ $item->rest_amount }}</td>
                <td>{{ $item->method }}</td>
                <td>{{ $item->transaction_id }}</td>
                <td>{{ $item->date_time }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
