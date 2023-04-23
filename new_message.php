<!-- PHP for adding messages to database, not for use in final site  -->
<div class="username-send-box">
      <label for="username">Username:</label>
      <textarea id="username" name="username"></textarea>
    </div>

    <div class="sender-send-box">
      <label for="sender">Sender:</label>
      <textarea id="sender" name="sender"></textarea>
    </div>

    <div class="message-send-box">
      <label for="message">Message:</label>
      <textarea id="message" name="message"></textarea>
      <button onclick="sendMessage()">Send</button>
    </div>
    
    <script>
      function sendMessage() {

        var username = document.getElementById("username").value;
        var msg_sender = document.getElementById("sender").value;
        var message = document.getElementById("message").value;

        console.log(username + " " +  msg_sender + " " + message);
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
