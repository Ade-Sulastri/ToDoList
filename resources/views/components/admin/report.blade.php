<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        @font-face {
        }
        h2 {
            text-align: center;
            font-family: "Poppins", serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 7px 5px;
            border: 0.3px solid black;
            text-align: center;
            font-size: 15px;
        }

        th {
            background-color: #7c7b78;
            color: white;
        }

        td {
            text-align: center;
        }

        .high-priority {
            background-color: #f56565;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .middle-priority {
            background-color: #ecc94b;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .low-priority {
            background-color: #48bb78;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h2>
        Detail Tasks Users
    </h2>
    <table style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Gabung</th>
                <th>Tugas</th>
                <th>Deadline</th>
                <th>Prioritas</th>
            </tr>
        </thead>
        <tbody>
            @if ($data && count($data) > 0)
                @foreach ($data as $data)
                    <tr>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->user->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->user->created_at)->format('d M Y') }}</td>
                        <td>{{ $data->task }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->deadline)->format('d M Y') }}</td>
                        <td>
                            <span
                                class="
        @if ($data->priority == 'High priority') high-priority
        @elseif($data->priority == 'Middle priority') middle-priority
        @else low-priority @endif">
                                {{ $data->priority }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            @else
                <p>Tidak tersedia data user</p>
            @endif
        </tbody>
    </table>
</body>

</html>
