drop table if exists Post;
create table Post (    
    id integer not null primary key autoincrement,    
    title varchar(80) not null,    
    msg text not null,
    d date,
    icon text,
    userName varchar(80) not null
); 

drop table if exists Comment;
create table Comment (
    id integer not null primary key autoincrement,
    cmsg text not null,
    cname varchar(80) not null,
    post_id integer not null references Post(id)
);

insert into Post values(null, "Assignment", "So many assignment!", "2019-01-02", "images/icon.jpg", "Ben");
insert into Post values(null, "Weather", "What a good day!", "2019-01-03", "images/icon.jpg", "Jane");
insert into Post values(null, "Exam result", "Exam result is released!", "2019-01-04", "images/icon.jpg", "Tom");
insert into Post values(null, "Holiday", "Time for travelling!", "2019-01-06", "images/icon.jpg", "May");
insert into Post values(null, "Place", "This place is so beatiful!", "2019-02-01", "images/icon.jpg", "Jane");
insert into Post values(null, "Food", "My favorite food is pizza.", "2019-02-04", "images/icon.jpg", "Ken");
insert into Post values(null, "New trimester", "New trimester is coming.", "2019-03-05", "images/icon.jpg", "Ben");
insert into Post values(null, "Movie", "I watched the Avenger today!", "2019-03-18", "images/icon.jpg", "Jane");
insert into Post values(null, "Shopping", "New clothes!", "2019-04-22", "images/icon.jpg", "QQ");
insert into Post values(null, "Wandering", "Brain stone!", "2019-04-23", "images/icon.jpg", "Cat");

insert into Comment values(null, "I agree!!", "Jane", 1);
insert into Comment values(null, "Due date is coming...", "Tom", 1);
insert into Comment values(null, "It is raining", "Ken", 2);
insert into Comment values(null, "Where r u Ken?", "Ben", 2);
insert into Comment values(null, "What is your grade?", "Ben", 3);
insert into Comment values(null, "I passed!!", "May", 3);
insert into Comment values(null, "So jealous!", "Jane", 4);
insert into Comment values(null, "Where are you going?", "Tom", 4);
insert into Comment values(null, "It is my hometown!", "Ken", 5);
insert into Comment values(null, "I don't like pizza.", "Jane", 6);
insert into Comment values(null, "Me too", "QQ", 6);
insert into Comment values(null, "T^T", "Tom", 7);
insert into Comment values(null, "How's it?", "Ken", 8);
insert into Comment values(null, "Dress up!", "Jane", 9);
insert into Comment values(null, "How much?", "May", 9);