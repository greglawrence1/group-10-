<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Messages</title>
    <link rel="stylesheet" href="navbarstyle.css">
    <link rel="stylesheet"  type="text/css" href="MessagePage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

<body>
<font face="Serif">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1">
                            <img src="logo.png" width="30" height="33">Art Commissioner
                        </span>
                    </div>
                </nav>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Home -->
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <!--Search-->
                    <li class="nav-item">
                    <a class="nav-link" href="search.php">Search</a>
                    </li>

                    <!-- About -->
                    <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                    </li>
                    
                    <!-- Logout -->
                    <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <!--Insert profile link in placeholder-->
                <li><a class="nav-link" href="#">@username</a></li>
                </ul>
                </div>
            </div>
        </nav>
</font>
<div>
  <div class="scrollmenu">
    <?php include 'get_messages.php';?>
  </div>


  <div class="message-box">
    <div class="message-header">
      <h3>Messages</h3>
    </div>
    <div class="message-content">
      <?php include 'get_conversation.php'; ?>
    </div>
  </div>

  <div class="offerbox">
    <div class="offer-header">
      <h> Offers </h>
    </div>
    <div class = "offers-content">
      <?php include 'get_offers.php'?>
    </div>
  </div>


  <div class="message-send-box">
      <label for="message">Message:</label>
      <textarea id="message" name="message"></textarea>
      <button onclick="sendMessage()">Send</button>
    </div>
    
    <script>
      function sendMessage() {
        //Scipt to deal with URL parameters
        var params = {};
        
        if (location.search) {
          var parts = location.search.substring(1).split('&');

        for (var i = 0; i < parts.length; i++) {
          var nv = parts[i].split('=');

        if (!nv[0]) continue;
          params[nv[0]] = nv[1] || true;
          }
        }

        var username = params.username;
        var msg_sender = params.msgsender;
        var message = document.getElementById("message").value;

        //console.log(username + " " +  msg_sender + " " + message);
        //Keep for testing for time being 
        
        var xhttp = new XMLHttpRequest();
        //When message submitted, Clear message box
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
            document.getElementById("message").value = "";
          }
        };
        xhttp.open("POST", "send_message.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("username=" + username + "&recipient=" + msg_sender + "&message_cont=" + message);
      }
    </script>
</div>
</body>
