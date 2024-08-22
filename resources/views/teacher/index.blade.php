<!DOCTYPE html>
<html>
<head>
    <title>Daftar Guru dan User</title>
</head>
<body>
    <h1>Daftar Guru-Guru</h1>
    <table border="1">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Ahli</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->NIP }}</td>
                    <td>{{ $teacher->Nama }}</td>
                    <td>{{ $teacher->Umur }}</td>
                    <td>{{ $teacher->Ahli }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Daftar User</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
