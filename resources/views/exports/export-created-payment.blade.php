<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>UID</th>
            <th>Year</th>
            <th>Month</th>
            <th>Deduction</th>
            <th>Bonus</th>
            <th>Final Amount</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @php
            $data = DB::table('create_payment')
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
                <td>{{ $item->year }}</td>
                <td>{{ $item->month }}</td>
                <td>{{ $item->deduction }}</td>
                <td>{{ $item->bonus }}</td>
                <td>{{ $item->final_amount }}</td>
                <td>{{ $item->comment }}</td>
                <td>{{ $item->status }}</td>


                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
