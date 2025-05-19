<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator BMI</title>
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

        .bmi-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
        }

        .bmi-container h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #4b0082; /* Indigo / Ungu */
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #333;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid #dcdcdc;
            border-radius: 10px;
            margin-bottom: 8px;
            font-size: 15px;
            transition: border-color 0.3s;
        }

        input[type="number"]:focus {
            border-color: #7b68ee;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #7b68ee; /* Medium Slate Blue */
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        button:hover {
            background-color: #6a5acd;
        }

        .error {
            color: #cc0044;
            font-size: 13px;
            margin-bottom: 12px;
            margin-top: -4px;
        }
    </style>
</head>
<body>

<div class="bmi-container">
    <h1>Kalkulator BMI</h1>

    <form method="POST" action="/bmi/calculate">
        @csrf

        <label>Berat Badan (kg):</label>
        <input type="number" name="weight" step="0.1" value="{{ old('weight') }}">
        @error('weight')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Tinggi Badan (cm):</label>
        <input type="number" name="height" step="0.1" value="{{ old('height') }}">
        @error('height')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Hitung BMI</button>
    </form>
</div>

</body>
</html>
