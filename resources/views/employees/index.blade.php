<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employess</title>
</head>

<body>
    @if (sizeof($employees))
        <h1>Employee List</h1>
        <a href="{{ url('employees/create') }}">Add</a>
        <a href="{{ url('logout') }}">logout</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $key => $employee)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>
                            <a href="{{ url('employees/edit', $employee->id) }}">edit</a>
                            <a href="{{ url('employees/delete', $employee->id) }}">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <tr>
            <td colspan="4"> No record found!</td>
        </tr>
    @endif
    {{ $employee->links}};
</body>

</html>
