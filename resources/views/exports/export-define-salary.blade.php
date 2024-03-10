<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>UID</th>
            <th>Starting Salary</th>
            <th>Incremented Salary</th>
            <th>Increment Count</th>
            <th>Total Salary</th>
            <th>Per Day Salary</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @php
            $data = DB::table('define_salary')
                ->orderBy('id', 'desc')
                ->get();
            
        @endphp
        @foreach ($data as $item)
            @php
                $uid = $item->uid;
                $incrementSalary = getIncrementedSalary($uid);
                $staffData = getStaffDetailsUsingUid($item->uid);
                if ($incrementSalary != false) {
                    $totalIncrement = 0;
                    foreach ($incrementSalary as $single_increment) {
                        $totalIncrement = $single_increment->amount + $totalIncrement;
                    }
                    $incrementCount = count($incrementSalary);
                    $total_salary = $totalIncrement + $item->starting_salary;
                    $perDay = round(($totalIncrement + $item->starting_salary) / 30, 2);
                } else {
                    $totalIncrement = 0;
                    $incrementCount = 0;
                    $total_salary = $item->starting_salary;
                    $perDay = round($item->starting_salary / 30, 2);
                }
            @endphp
            <tr>
                <td>{{ $staffData[0]->name }}</td>
                <td>{{ $item->uid }}</td>
                <td>{{ $item->starting_salary }}</td>
                <td>{{ $totalIncrement }}</td>
                <td>{{ $incrementCount }}</td>
                <td>{{ $total_salary }}</td>
                <td>{{ $perDay }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
