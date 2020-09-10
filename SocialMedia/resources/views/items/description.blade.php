
@extends('layouts/master')
    
    @section('title')
        Description document
    @endsection

    @section('content') 
        <h2>Requirement Description</h2><br>
        <h3>Completed:</h3>
        <h4>1. Navigation menu is shown at all pages.</h4>
        <h4>2. All posts are displayed at home page without showing comments.</h4>
        <h4>3. The number of comments for each post is shown next to each post.</h4>
        <h4>4. In home page, clicking the post title can bring up the comments page which contains the post and all comments for that post.</h4>
        <h4>5. A form is displayed at home page for users to create a new post. The post contains a title, a message, a date, an icon and user's name. Users must enter the title, message and user's 
        name. Data is entered by users when creating a new post. After new post created, page redirects to the home page.</h4>
        <h4>6. Users can edit posts. After edition, page redirects to comments page.</h4>
        <h4>7. Users can delete posts. After deleting post, the comments for that post are also deleted.</h4>
        <h4>8. Users can add comments to a post. A comment should include a message and the user's name.</h4>
        <h4>9. Users can delete comments.</h4>
        <h4>10. A user page shows all the unique users who have made a post. The user's posts will be shown after clicking user's name.</h4>
        <h4>11. A recent page shows all the posts made in the last 7 days.</h4>
        <h4>12. Laravel is used. Database access is implemented via raw SQL and executed through Laravel's DB class.</h4>
        <h4>13. SQL file <em>create_post_table.sql</em> is used to create table and insert initial data.</h4>
        <h4>14. All input are validated. Validation error message is shown within the view.</h4>
        <h4>HTML and SQL sanitisation are performed.</h4>
        <h4>Template inheritance is used.</h4>
        <br>

        <h3>Not completed:</h3>
        <h4>None.</h4>
        <br>

        <h3>Interesting approaches:</h3>
        <h4>1. Boostrap is used for UI framework design.</h4>
        <h4>2. A variable is used to store the post id before deleting a comment. The page can redirect to the comment page with that variable.</h4>
        <br>

        <h3>Extra:</h3>
        <h4>1. Date can be select from a calendar.</h4>
    @endsection