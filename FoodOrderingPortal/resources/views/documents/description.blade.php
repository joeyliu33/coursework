@extends('layouts.app')

  @section('content')

    <h3>Completed:</h3>
    <p>1.Users can register with this website. When registering, users must provide their name, email, password, and address. Furthermore, users must register as either a Restaurant or Consumer.</p>
    <p>2. Registered users can login. Users should be able to login (or get to the login page) from any page. A logged in user should be able to log out.</p>
    <p>3. Only the restaurant users can add dishes to the list of dishes sold by his/her restaurant. They can also update and delete existing dishes. A dish must have a name and a price. A dish name must be unique. A price must be a positive value.</p>
    <p>4. All users (including guests) can see a list of registered restaurants. They can click into any restaurant to see the dishes this restaurant sells.</p>
    <p>5. The list of dishes should be paginated with at most 5 dishes per page.</p>
    <p>6. (Single purchase) Only consumers can purchase a dish. Since we do not deal with payment gateways in this course, when user clicks on purchase, we simply assume the payment is successful, and save the purchase order in the database. Then it will display the dish purchased, the price, and the delivery address (which is the consumer’s address) to let the user know that the purchase is successful.</p>
    <p>7. A restaurant (user) can see a list of orders customers have placed on his/her restaurant. An order should consist of the name of the consumer, that dish (name) that was ordered, and the date that the order was placed.</p>
    <p>8. After user login, appropriate redirections should be provided. E.g. if user logs in from the details page, then after user logs in, s/he should be redirected back to that page.</p>
    <p>9. When restaurant users add a new dish, the dish name must be unique for that restaurant, not across restaurants. This is an extension of requirement 3.</p>
    <p>10. When restaurant users add a dish, s/he can upload a photo for that dish. This photo will be displayed when this dish displayed.</p>
    <p>11. In addition to requirement 6 (single purchase), consumers can add multiple dishes to a cart, see the contents in the cart, the cost of this cart (the sum of all dishes).</p>
    <h3>Incomplete:</h3>
    <p>1.	After user register and logout, appropriate redirections should be provided.</p>
    <p>2. remove any unwanted dishes, before purchasing these dishes. Once purchased, the cart will be emptied.</p>
    <p>3. There is a page which lists the top 5 most popular (most ordered) dishes in the last 30 days.</p>
    <p>4. Restaurants can view a statistic page which shows the sales statics for that restaurant. This page shows:</p>
        <p>a. The total amount of sales (in dollar value) made by this restaurant.</p>
        <p> b. The weekly sales total (in dollar value) for the last 12 weeks, i.e. there should be a sales</p>
        <p> total for each of the last 12 weeks.</p>
        <p>5. There is another user type called administrator.</p>

    <h3>Interesting and extra:</h3>
    <p>None.</p>

@endsection
