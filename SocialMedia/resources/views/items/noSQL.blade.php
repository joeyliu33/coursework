@extends('layouts/master')

    @section('title')
        noSQL
    @endsection

    @section('content') 
    <h1>noSQL</h1><br>
    <h2>Advantages and disadvantages of noSQL</h2><br>
    <h3>Advantages:</h3>
    <h4>1. Elastic scaling</h4>
    <h4>As database load increases, database administrators rely heavily on scale up since RDBMSs are difficult 
    to scale out on commodity clusters. However, noSQL are made for transparent expansion to take advantages of 
    new nodes. </h4>
    <h4>2. Big data</h4>
    <h4>Since the transaction rates are growing out of recognition, a massive volume of data is required to 
    be stored. Although RDBMSs have grown to meet the needs, it is still difficult to manage the big data with 
    a single RDBMS. However, noSQL can easily handle the big data issue.</h4>
    <h4>3. Economics</h4>
    <h4>From economics perspective, noSQL uses cheap commodity server clusters to manage the exploding data and 
     transaction volumes while RDBMSs require expensive storage systems and proprietary servers.</h4><br>

    <h3>Disadvantages:</h3>
    <h4>1. Maturity</h4>
    <h4>Unlike RDBMSs which has been released for almost 3 decades, noSQL is still a new technology for the 
    market. NoSQL is still considered as less mature while some main features are still in pre-production versions 
    and not yet for implementation.</h4>
    <h4>2. Support</h4>
    <h4>A lack of technical support is another concern of noSQL. Since noSQL is still the new technology, only a 
    few small companies can provide support for noSQL database, unlike RDBMSs vendors such as Oracle and IBM.</h4>
    <h4>3. Standardisation</h4>
    <h4>NoSQL does not have a standard platform which is an obstacle for noSQL to develop. Standardisation is an 
    important component for database to be unified. Without standardisation, the immigration of database is difficult
    to be implemented.</h4><br>

    <h2>Social Network Application</h2><br>
    <h4>Provided that the application and the number of users will grow with the development of the company, noSQL is the best solution </h4>
    <h4>to design a social network application. It is no doubt that using SQL to develop the application at the beginning is much easier</h4>
    <h4>than noSQL. However, as the application grows with increasing number of users, the management of cluster will become a big</h4>
    <h4>problem. Purchase of bigger servers to scale up is the only solution for SQL to deal with this problem. However, noSQL are designed</h4>
    <h4>for transparent expansion with the advantage of new nodes. More importantly, the massive volumes of data handling will be</h4>
    <h4>another problem when the number of users is increasing. SQL can hardly handle this trend by using a single RDBMS, which becomes</h4>
    <h4>intolerable for other companies. On the other hand, the big data can be easily handled by NoSQL. Therefore, the application will be </h4>
    <h4>implemented with noSQL database.</h4><br>
    <h4>Assumption:</h4>
    <h4>1. The application and the number of users will grow up. </h4>
    <h4>2. The main business of this company is social network application.</h4>
    @endsection