<?php
    //Connect To DB Function
    function connection() {
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    
        if(mysqli_connect_errno()) {
            die("Database connection failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno() . ")"
               );
        } else {
            
        }
        
        return $connection;
    }

    //Connect To Matchfinder DB Function
    function matchfinder_connection() {
        $db_name = 'matchfinder';
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, $db_name);
    
        if(mysqli_connect_errno()) {
            die("Database connection failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno() . ")"
               );
        } else {
            
        }
        
        return $connection;
    }

    //Database Query Function
    function query_db($database, $order, $limit) {
        $connection = connection();
        $sql = 'SELECT * FROM  '. $database .' ORDER BY ID '. $order .' LIMIT '. $limit .'';
        $response = mysqli_query($connection, $sql); 
        
        return $response  ;
    }

    //Matchfinder Database Query Function
    function query_matchfinder_db($database) {
        $connection = matchfinder_connection();
        $sql = 'SELECT * FROM  '. $database .'';
        $response = mysqli_query($connection, $sql); 
        
        return $response  ;
    }

    //Article post Function
    function post_newArticle() {
        //Set Varibles
        $response = '';
        $news_headline = strip_tags(Request::post('news_headline'));
        $news_article = strip_tags(Request::post('news_article'));
        $news_author = Session::get('user_name');
        
        //Establish Connection
        $connection = connection(); 
        
        //Check If Set
        if (isset($_POST["submit"])) {
            if (empty($news_headline)) {
                $response = "Please add a Headline";
            } else if (empty($news_article)) { 
                $response = "Article needs content";
            } else if (empty($news_author)){
                $response = "Please set the author";
            } else {
                $query = "INSERT INTO newsDatabase (news_headline, news_article, news_author) VALUES ('{$news_headline}', '{$news_article}', '{$news_author}')";
                $result = mysqli_query($connection, $query); 
                
                if($result) {
                    $database = 'newsDatabase';
                    $order = 'DESC';
                    $limit = '1';
                    
                    $query_result = query_db($database, $order, $limit);
                    $row = mysqli_fetch_assoc($query_result);
                    
                    $response = '<p>Your article has been posted: <a style="color:black;" href="' . Config::get('URL') . 'article/index?article=' . $row['news_headline'] . '">view here</a>';
                } else {
                    $response = 'Nope.png'; 
                }
            }
        }
        
        //Return Response Message
        return $response;   
    }

    //Matchfinder Post Function
    function post_matchfinder() {
        //Set Varibles 
        $response = '';
        $gamertag = strip_tags(Request::post('Gamertag'));
        $game = strip_tags(Request::post('Game'));
        $description = strip_tags(Request::post('Description'));
        $region = strip_tags(Request::post('Region'));
        $console = strip_tags(Request::post('Console'));
        
        //Establish Connection
        $connection = matchfinder_connection(); 
        
        //Check If Set
        if (isset($_POST["submit"])) {
            if (empty($gamertag)) {
                $response = "Please enter a Gamertag!";
            } else if (empty($game)) { 
                $response = "Please select game type!";
            } else if (empty($description)){
                $response = "Please enter description!";
            } else if (empty($region)){
                $response = "Please select your region!";
            } else if (empty($console)){
                $response = "Please select your console!";
            } else {
                if(isset($_POST["submit"])) {
                    $query = "INSERT INTO matchFinder (user, game, description, region, console) VALUES ('{$gamertag}', '{$game}', '{$description}', '{$region}', '{$console}')";
                    $result = mysqli_query($connection, $query); 
                
                    if($result) {
                        $response = 'Game Player Requested Succesfully Posted!';
                    } else {
                        $response = 'Nope.png'; 
                    }
                }
            }
        }
        
        //Return Response Message
        return $response;
    }

    //Matchfinder Get Function
    function get_matchfinder($gameFilter, $regionFilter, $consoleFilter) {
        //Set Varibles
        $database = 'matchFinder';
        $order = 'DESC';
        $time = '3';
        $limit = '20';
        
        //Query Function
        $connection = matchfinder_connection();
        $sql = 'SELECT * FROM '.$database.'';
        //SELECT Filtering
        $filters = array();
        if (strlen($gameFilter) > 0) {
            $filters[] = 'game = "'.$gameFilter.'"';
        } if (strlen($regionFilter) > 0) {
            $filters[] = 'region = "'.$regionFilter.'"';
        } if (strlen($consoleFilter) > 0) {
            $filters[] = 'console= "'.$consoleFilter.'"';
        } if (strlen($time) > 0) {
            $filters[] = 'time > DATE_SUB( NOW(), INTERVAL 3 HOUR)';
        } if (count($filters) > 0) {
            $sql .= ' WHERE '.implode(' AND ', $filters);
        } if (strlen($order) > 0) {
            $sql .= ' ORDER BY ID '.$order;
        } if ($limit > 0) {
            $sql .= ' LIMIT '.$limit;
        }
        $response = mysqli_query($connection, $sql); 
        
        //Return
        return $response;
    }

    //Matchfinder Add New Filter Function
    function add_matchfinder_filter($database) {
        
        $response = '';
        
        $gamertag = strip_tags(Request::post('display_game'));
        $game = strip_tags(Request::post('server_game'));
        
        //Establish Connection
        $connection = matchfinder_connection(); 
        
        //Check If Set
        if (isset($_POST["submit"])) {
            if (empty($gamertag)) {
                $response = "Please enter a game";
            } else if (empty($game)) { 
                $response = "Please set server name";
            } else {
                if(isset($_POST["submit"])) {
                    $query = "INSERT INTO ". $database ." (game_display_name, game_server_name) VALUES ('{$gamertag}', '{$game}')";
                    $result = mysqli_query($connection, $query); 
                
                    if($result) {
                        $response = 'Game Player Requested Succesfully Posted!';
                    } else {
                        $response = $query; 
                    }
                }
            }
        }
        
        //Return Response Message
        return $response;
    }


    //Matchfinder Edit Function
    function edit_matchfinder() {
    }

    //Time Ago Function
    function get_timeago( $ptime ) {
        $estimate_time = time() - $ptime;
        
        if( $estimate_time < 1 )
        {
            return 'less than 1 second ago';
        }
        
        $condition = array( 
            12 * 30 * 24 * 60 * 60  =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );
        
        foreach( $condition as $secs => $str )
        {
            $d = $estimate_time / $secs;
            
            if( $d >= 1 )
            {
                $r = round( $d );
                return '' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
            }
        }
    }
?>