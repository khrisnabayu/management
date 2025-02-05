<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Excel Data</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .print-btn {
            margin: 20px;
            padding: 10px 15px;
            background: green;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Users Data</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Description</th>
                <th>Phonenumber</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $rs)
                <tr>
                    <td>{{ $rs->id }}</td>
                    <td>{{ $rs->name }}</td>
                    <td>{{ $rs->address }}</td>
                    <td>{{ $rs->description }}</td>
                    <td>{{ $rs->phonenumber }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button class="print-btn" onclick="printPage()">Print Data</button>

    <script>
        function printPage() {
            Swal.fire({
                title: "Printing...",
                text: "Your print preview is opening.",
                icon: "info",
                timer: 2000,
                showConfirmButton: false
            });

            setTimeout(() => {
                window.print();
            }, 1000);
        }
    </script>

</body>
</html>
