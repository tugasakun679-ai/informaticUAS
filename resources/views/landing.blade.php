<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Tugas Kuliah</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0" width="50%" align="center">
        <tr>
            <th colspan="2">
                <h1>Portal Tugas Kuliah</h1>
            </th>
        </tr>
        <tr>
            <td align="center" width="50%">
                <a href="{{ asset('store/index.html') }}">
                    <h2>UTS</h2>
                </a>
            </td>
            <td align="center" width="50%">
                <a href="{{ route('uas.shop') }}">
                    <h2>UAS</h2>
                </a>
            </td>
        </tr>
    </table>
</body>
</html>
