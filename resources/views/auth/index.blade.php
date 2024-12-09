<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
</head>

<body>
    <h1>Daftar User</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo" width="50">
                        @else
                            No Photo
                        @endif
                    </td>
                    <td>
                        <!-- Tindakan lain, misalnya edit atau hapus -->
                        <a href="#">Edit</a> | <a href="#">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
