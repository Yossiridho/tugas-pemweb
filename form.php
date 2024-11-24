<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
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

        form {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        form h1 {
            margin-bottom: 20px;
            font-size: 1.5em;
            text-align: center;
            color: #555;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 0.9em;
            color: #444;
        }

        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9em;
            font-family: inherit;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #007BFF;
            box-shadow: 0 0 3px rgba(0, 123, 255, 0.5);
        }

        textarea {
            resize: vertical;
            height: 80px;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
        }

        button:hover {
            background-color: #0056b3;
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

        @media (max-width: 600px) {
            form {
                padding: 15px 20px;
            }

            input, textarea, button {
                font-size: 0.85em;
            }
        }


    </style>
</head>
<body>
    <h1>Registration Form</h1>
    <form action="process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" min="1" required>
        <br>

        <label for="bio">Bio:</label>
        <textarea id="bio" name="bio" minlength="10" required></textarea>
        <br>

        <label for="file">Upload a File (TXT only):</label>
        <input type="file" id="file" name="file" accept=".txt" required>
        <br>

        <button type="submit">Submit</button>
    </form>

    <script>
        function validateForm() {
            const username = document.getElementById('username').value.trim();
            const email = document.getElementById('email').value.trim();
            const bio = document.getElementById('bio').value.trim();
            const fileInput = document.getElementById('file');
            const file = fileInput.files[0];

            if (!username || username.length < 3) {
                alert("Username must be at least 3 characters long.");
                return false;
            }

            if (!email.includes("@")) {
                alert("Please enter a valid email.");
                return false;
            }

            if (!bio || bio.length < 10) {
                alert("Bio must be at least 10 characters long.");
                return false;
            }

            if (!file) {
                alert("Please upload a file.");
                return false;
            }

            if (file.size > 1048576) { // 1MB
                alert("File size must be less than 1MB.");
                return false;
            }

            if (file.type !== "text/plain") {
                alert("File must be a .txt file.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
