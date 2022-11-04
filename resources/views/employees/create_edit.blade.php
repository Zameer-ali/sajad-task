<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action=" @if(isset($employee))  {{ url('employees/update', $employee->id) }} @else {{ url('employees') }} @endif " method="post">
        @csrf
        <input type="text" value="@if(isset($employee)) {{ $employee->name }}  @endif " name="name">
        <input type="email" value="@if(isset($employee)) {{ $employee->email }}  @endif " name="email">
        <input type="text" value="@if(isset($employee)) {{ $employee->address }}  @endif " name="address">
        <input type="submit" value="submit">
    </form>
</body>

</html>
