<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatted Number with Comma Class</title>
    <style>
        /* You can add custom styles here, e.g., to style the number */
        .comma-format {
            font-size: 24px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
    <h1>Formatted Number</h1>
    <div class="comma-format" data-number="1000"></div>
    <div class="comma-format" data-number="1234567"></div>
    <div class="comma-format" data-number="987654321"></div>

    <script>
        // Function to format a number with commas
        function formatNumberWithCommas(number) {
            return number.toLocaleString();
        }

        // Select all elements with the "comma-format" class
        const elements = document.querySelectorAll('.comma-format');

        // Loop through each element and apply the formatted number
        elements.forEach(element => {
            const number = element.getAttribute('data-number');  // Get the raw number from data attribute
            element.textContent = formatNumberWithCommas(Number(number));  // Apply the formatted number
        });
    </script>
</body>
</html>
