<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
    $sql = "select * from Post";
    $posts = DB::select($sql);
    $ncomments = count_comment();
    return view('items.post_list')->with('posts', $posts)->with('ncomments', $ncomments);
});

Route::get('comments/{id}', function($id){
    $post = get_post($id);
    $comments = get_comment($id);
    $Pcomments = array($post, $comments);
    //dd($Pcomments);
    $ncomments = count_comment();
    return view('items.comments')->with('Pcomments', $Pcomments)->with('ncomments', $ncomments)->with('post',$post);
});

Route::post('add_post_action', function(){
    $title = request('title');
    $msg = request('msg');
    $d = request('d');
    $userName = request('userName');
    $icon = "images/icon.jpg";
    if($title && $msg && $d && $userName){
        $id = add_post($title, $msg, $d, $icon, $userName);
        if ($id){
            return redirect(url("/"));
        }
        else{
            $error = "Error while adding post.";
            return view('items.view_error')->with('error', $error);

        }
    }
    else{
        $error = "Title, message, date and name cannot be empty.";
        return view('items.view_error')->with('error', $error);

    }

});

Route::post('add_comment_action', function(){
    $id = request('id');
    $cname = request('cname');
    $cmsg = request('cmsg');
    if($cname && $cmsg){
        $id = add_comment($cname, $cmsg, $id);
        if ($id){
            $sql = "select Post.id from Post, Comment where Post.id=Comment.post_id and Comment.id=?";
            $ids = DB::select($sql,array($id));
            $id = $ids[0]->id;
            return redirect(url("comments/$id"));
        }
        else{
            $error = "Error while adding comment.";
            return view('items.view_error')->with('error', $error);
        }
    }
    else{
        $error = "Name and message cannot be empty.";
        return view('items.view_error')->with('error', $error);
    }

});


Route::get('delete_comment/{id}', function($id){
    if($id){
        $sql = "select post_id from Comment where id=?";
        $postid = DB::select($sql, array($id));
        $post_id = $postid[0]->post_id;
        delete_comment($id);
        return redirect(url("comments/$post_id"));
    }
});


Route::get('delete_post/{id}', function($id){
    if($id){
        delete_post($id);
        return redirect(url("/"));
    }
});

Route::get('update_post/{id}', function($id){
    $post = get_post($id);
    return view('items.update_post')->with('post', $post);
});

Route::post('update_post_action', function(){
    $id = request('id');
    $title = request('title');
    $msg = request('msg');
    $d = request('d');
    $userName = request('userName');
    $icon = "images/icon.jpg";
    if($title && $msg && $d && $userName){
        update_post($id, $title, $msg, $d, $icon, $userName);
        return redirect(url("comments/$id"));
    }
    else{
        $error = "Update error: item not exists or title, message, date or name are empty.";
        return view('items.view_error')->with('error', $error);
    }
});

Route::get('view_user', function(){
    $users = find_user();
    return view('items.view_user')->with('users', $users);
});

Route::get('view_userPost/{userName}', function($userName){
    $userPosts = find_userPost($userName);
    $ncomments = count_comment();
    return view('items.view_userpost')->with('userPosts',$userPosts)->with('ncomments', $ncomments);
});

Route::get('7days_posts', function(){
    $recentPosts = find_7daysPost();
    $ncomments = count_comment();
    return view('items.7days_posts')->with('recentPosts', $recentPosts)->with('ncomments',$ncomments);
});

Route::get('erDiagram',function(){
    return view('items.ERdiagram');
});

Route::get('description',function(){
    return view('items.description');
});

Route::get('noSQL', function(){
    return view('items.noSQL');
});


# retrieve all post attributes from Post table in database according to the given post id
function get_post($id){
    $sql = "select * from Post where id=?";
    $posts = DB::select($sql,array($id));
    if (count($posts)< 1){
        dd($posts, $id);
        die("Something has gone wrong, invalid  query or result: $sql");
    }
    $post = $posts[0];
    return $post;
}

# retrieve all comments of a post from Comment table in database according to the given post id
function get_comment($id){
    $sql = "select Comment.id, Comment.cmsg, Comment.cname from Post, Comment where Post.id=Comment.post_id and Post.id=?";
    $comments = DB::select($sql, array($id));
    return $comments;
}

# add a new post to the database and return the post id of the latest added post
function add_post($title, $msg, $d, $icon, $userName){
    $sql = "insert into Post (title, msg, d, icon, userName) values (?,?,?,?,?)";
    DB::insert($sql, array($title, $msg, $d, $icon, $userName));
    $id = DB::getPdo()->lastInsertId();
    return $id;
}

# add a new comment to the database and return the comment id of the latest added post
function add_comment($cname, $cmsg, $id){
    $sql = "insert into Comment (cmsg, cname, post_id) values (?,?,?)";
    DB::insert($sql, array($cmsg, $cname, $id));
    $id = DB::getPdo()->lastInsertId();
    return $id;
}

# delete comment according to the comment id
function delete_comment($id){
    $sql = "delete from Comment where id=?";
    DB::delete($sql,array($id));
}

# delete post according to the post id and delete all the comments for that post
function delete_post($id){
    $sql1 = "delete from Comment where post_id=?";
    DB::delete($sql1, array($id));
    $sql = "delete from Post where id=?";
    DB::delete($sql,array($id));
}


# update post attributes according to user input
function update_post($id, $title, $msg, $d, $icon, $userName){
    $sql = "update Post set title=?, msg=?, d=?, icon=?, userName=? where id=?";
    DB::update($sql,array($title, $msg, $d, $icon, $userName, $id));
}

# count the number of comment for each post
function count_comment(){
    $sql = "select post.id, count(Comment.post_id) AS ncomment from Post left join Comment on Post.id=Comment.post_id group by Comment.post_id";
    $ncomments = DB::select($sql);
    return $ncomments;
}

# retrieve the unique users name grouping by user name
function find_user(){
    $sql = "select id, userName from Post group by userName";
    $users = DB::select($sql);
    return $users;
}

# retrieve a user's all post according to user name
function find_userPost($userName){
    $sql = "select * from Post where userName=?";
    $userPosts = DB::select($sql,array($userName));
    return $userPosts;
}

# retrieve all post in last 7 days
function find_7daysPost(){
    $sql = "select * from Post where d >= date('now','-7 days')";
    $recentPosts = DB::select($sql);
    return $recentPosts;
}