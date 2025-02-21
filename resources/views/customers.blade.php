<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
</head>
<body>

<h1>Customer List</h1>

<!-- Filters and Sorting Form -->
<form method="GET" action="{{ url('customers') }}">
    <input type="text" name="filter[first_name]" placeholder="Filter by First Name" value="{{ request('filter.first_name') }}">
    <input type="text" name="filter[email]" placeholder="Filter by Email" value="{{ request('filter.email') }}">

    <select name="sort[first_name]">
        <option value="">Sort by First Name</option>
        <option value="asc" {{ request('sort.first_name') == 'asc' ? 'selected' : '' }}>Ascending</option>
        <option value="desc" {{ request('sort.first_name') == 'desc' ? 'selected' : '' }}>Descending</option>
    </select>

    <select name="sort[email]">
        <option value="">Sort by Email</option>
        <option value="asc" {{ request('sort.email') == 'asc' ? 'selected' : '' }}>Ascending</option>
        <option value="desc" {{ request('sort.email') == 'desc' ? 'selected' : '' }}>Descending</option>
    </select>

    <input type="number" name="page[number]" value="{{ request('page.number', 1) }}" hidden>
    <input type="number" name="page[size]" value="{{ request('page.size', 10) }}" hidden>

    <button type="submit">Apply Filters and Sorting</button>
</form>

<!-- Customer List Table -->
<table border="1">
    <thead>
    <tr>
        <th>First Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->first_name }}</td>
            <td>{{ $customer->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<!-- Pagination Links -->
<div>
    {{ $customers->appends(request()->query())->links() }}
</div>

</body>
</html>
