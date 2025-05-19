<!DOCTYPE html>
<html>
<head>
    <title>Hasil BMI</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #6a5acd; /* Ungu kebiruan */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .result-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
            text-align: center;
        }

        h1 {
            margin-bottom: 25px;
            color: #4b0082;
        }

        p {
            font-size: 18px;
            margin: 12px 0;
            color: #333;
        }

        .category {
            font-weight: bold;
            color: #7b68ee;
            font-size: 20px;
        }

        .back-link {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 20px;
            background-color: #7b68ee;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            transition: background-color 0.3s;
        }

        .back-link:hover {
            background-color: #6a5acd;
        }
    </style>
</head>
<body>

<div class="result-container">
    <h1>Hasil BMI</h1>
    <p><strong>BMI Anda:</strong> {{ number_format($bmi, 2) }}</p>
    <p class="category"><strong>Kategori:</strong> {{ $category }}</p>
    <a class="back-link" href="/bmi">Hitung Lagi</a>
</div>

</body>
</html>
