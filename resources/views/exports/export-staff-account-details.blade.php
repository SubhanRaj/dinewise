<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>UID</th>
            <th>Bank Name</th>
            <th>Account Holder Name</th>
            <th>Account Number</th>
            <th>IFSC Code</th>
            <th>Phone Number</th>
            <th>Google Pay</th>
            <th>Phone Pay</th>
            <th>PayTm</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @php
            $data = DB::table('staff_account_details')
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
                <td>{{ $item->bank_name }}</td>
                <td>{{ $item->account_holder_name }}</td>
                <td>{{ $item->acc_no }}</td>
                <td>{{ $item->ifsc_code }}</td>
                <td>{{ $item->phone_number }}</td>
                <td>{{ $item->gpay }}</td>
                <td>{{ $item->phonepay }}</td>
                <td>{{ $item->paytm }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
