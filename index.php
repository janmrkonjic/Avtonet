<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>avto.net Clone</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
        /* Apply styles to the search form */
        form {
            text-align: center;
            margin-top: 20px;
        }

        h1   {
            margin-left: 20px;
        }

        /* Style the input field */
        input[type="text"] {
            padding: 10px;
            width: 1250px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Style the search button */
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        /* Hover effect for the search button */
        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Style the filters */
        select {
            margin-left: 10px;
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 10px;
        }

        .search {
            margin-left:10px;
        }
    </style>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Cars</a></li>
                <li><a href="#">Motorcycles</a></li>
                <li><a href="#">Trucks</a></li>
                <li><a href="#">Caravans</a></li>
                <li><a href="#">Accessories</a></li>
            </ul>
        </nav>
        <h1>Welcome to avto.net Clone</h1>
    </header>
    <h1>Vehicle Search</h1>

<form method="get" action="search.php">
    <input type="text" name="search_query" placeholder="Search by model, price, age...">
    <button type="submit">Search</button>
</form>
<br>
 <!-- Brand filter -->
 <select name="brand">
            <option value="">Select Brand</option>
            <option value="Brand1">Brand1</option>
            <option value="Brand2">Brand2</option>
            <!-- Add more brand options as needed -->
        </select>

        <!-- Model filter -->
        <select name="model">
            <option value="">Select Model</option>
            <option value="Model1">Model1</option>
            <option value="Model2">Model2</option>
            <!-- Add more model options as needed -->
        </select>

        <!-- Price filter -->
        <select name="price">
            <option value="">Select Price Range</option>
            <option value="5000">$5,000 or less</option>
            <option value="10000">$10,000 or less</option>
            <!-- Add more price options as needed -->
        </select>

        <!-- Vehicle Type filter -->
        <select name="vehicle_type">
            <option value="">Select Vehicle Type</option>
            <option value="Sedan">Sedan</option>
            <option value="SUV">SUV</option>
            <!-- Add more vehicle type options as needed -->
        </select>
        <br><br>
        <button class="search" type="submit">Search</button>
    </form>

    
    <section class="featured-cars">
        <h2>Featured Cars</h2>
        <!-- Display featured car listings here -->
    </section>
    
    <section class="latest-news">
        <h2>Latest News</h2>
        <!-- Display latest news articles here -->
    </section>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> avto.net Clone</p>
    </footer>
</body>
</html>