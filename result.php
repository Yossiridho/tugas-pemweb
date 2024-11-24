<?php
session_start();
if (!isset($_SESSION['data'])) {
    die("No data available.");
}

$data = $_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <style>
        /* CSS minimalis dan modern */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h1, h2 {
            text-align: center;
            color: #555;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
            color: #333;
        }

        td {
            background-color: #fff;
        }

        .center {
            text-align: center;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Submission Results</h1>

        <h2>User Information</h2>
        <table>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Username</td>
                <td><?= htmlspecialchars($data['username']) ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= htmlspecialchars($data['email']) ?></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><?= htmlspecialchars($data['age']) ?></td>
            </tr>
            <tr>
                <td>Bio</td>
                <td><?= htmlspecialchars($data['bio']) ?></td>
            </tr>
            <tr>
                <td>User Agent</td>
                <td><?= htmlspecialchars($data['userAgent']) ?></td>
            </tr>
        </table>

        <h2>File Content</h2>
        <?php if (!empty($data['fileLines'])): ?>
        <table>
            <tr>
                <th>Line</th>
                <th>Content</th>
            </tr>
            <?php foreach ($data['fileLines'] as $index => $line): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($line) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
        <p class="center">No content available in the uploaded file.</p>
        <?php endif; ?>
    </div>
</body>
</html>
