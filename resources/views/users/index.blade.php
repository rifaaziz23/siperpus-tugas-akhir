<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user) 
            <tr>
                <td>{{ $user->npm }}</td>
                <td>{{ $user->fullName }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>