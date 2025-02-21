<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
</head>
<body>

<!-- Welcome Message -->
<h2>Welcome</h2>

<!-- Link to Customers Page with Sorting Parameters -->
<p>
    <a href="{{ url('customers?sort[first_name]=asc&sort[email]=desc&page[number]=1&page[size]=10') }}">Go to Customers Page</a>
</p>

</body>
</html>
