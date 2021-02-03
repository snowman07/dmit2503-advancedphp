<?php
    include("includes/header.php")
?>

<!-- This will be completed in class. -->
<script type="text/javascript">

    function createRequestObject() {
        var ro;
        var browser = navigator.appName;
        if(browser == "Microsoft Internet Explorer"){
            ro = new ActiveXObject("Microsoft.XMLHTTP");
        }else{
            ro = new XMLHttpRequest();
        }
        return ro;
    }
    var http = createRequestObject();

    function processForm(){ // WE CAN USE THIS FUNCTION TO RECEIVE INPUT FROM FORM ELEMENTS...

        //alert("submitted");

        var username = document.myform.username.value; // this is base from the <form> below
        var password = document.myform.password.value; // this is base from the <form> below

        //console.log(username + "; " + password);

        // alert(username)// you can use this to test that you are receiving values from the form
        
        
        sndReq(username,password);// ..AND THEN SENDS THOSE VARS TO THE MAIN FUNCTION THAT WRITES THEM TO A QUERY STRING AND SENDS THROUGH AJAX.
    }

    // HERE IS THE MAIN FUNCTION 
    // WE CAN CALL THIS FROM YOUR HTML LINKS
    // example: <a href="#" onclick="sndReq('genre','Rock');

    function sndReq(username,password) {

        http.open('get', 'loginprocess.php?username='+username+'&password='+password);
        
        //document.location =('get', 'loginprocess.php?username='+username+'&password='+password); // just for testing: this will redirect you to dynamic page where you should be able to see the query. Make sure you turn this line OFF when done !
        
        http.onreadystatechange = handleResponse;
        http.send(null);
    }
    // THIS FUNCTION THEN RECEIVES THE INFO FROM THE PROCESSING PAGE AND WRITES IT TO THE CURRENT STATIC PAGE
    function handleResponse() {
        if(http.readyState == 4){
        
            /* 
            ReadyState Values
                        0	The request is not initialized
                        1	The request has been set up
                        2	The request has been sent
                        3	The request is in process
                        4	The request is complete
                        
                */
            var response = http.responseText;
            // YOU MUST HAVE AN EMPTY <div> SOMEWHERE WHERE WE USE THE innerHTML METHOD OF JS TO WRITE THE NEW CONTENT.
        document.getElementById('message').innerHTML = response;   
        }
    }
</script>




</head>
<body>
    <p>The new way of doing it. <br />Info is sent to processing page, while user waits at this page.</p>
    <h2> Please login (AJAX style)</h2>


<form action="javascript:processForm()" name="myform" method="post">
    Login: <input type="text" name="username"><br>
    Password: <input type="text" name="password"><br>
    <input type="submit" name="submit"><br>
</form>

<div id="message"><!-- HERE WE USE AJAX FROM ANOTHER PAGE TO DYNAMICALLY WRITE SOMETHING TO THE USER -->
</div>

<?php
    include("includes/footer.php")
?>
