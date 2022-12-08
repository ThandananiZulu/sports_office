<?php echo view('resources/links'); ?>
<?php echo view('resources/css'); ?>
<?php echo view('resources/header'); ?>
<style>
    body {
        margin: 0 auto;
        display: flex;
        justify-content: center;
        flex-direction: column;
        height: 90vh;
        width: 90%;
        max-width: 1200px;
    }

    #message-container {
        border: 1px solid black;
        flex-grow: 1;
        overflow-y: auto;

    }

    #message-container {
        background-color: #fff;
        padding: 5px
    }
</style>
<div id="message-container" class="container mt-5 text-dark"></div>
<form id="form" action="">
    <label for="message-input">Message</label>
    <input type="text" class="form-control" id="message-input" placeholder="">
    <button type="submit" class="btn mb-5" id="send-button">Send</button>
    <label for="room-input">Room</label>
    <input type="text" class="form-control" id="room-input" placeholder="">
    <button type="button" class="btn" id="room-button">Join</button>
</form>
<script src="https://cdn.socket.io/4.5.4/socket.io.min.js" integrity="sha384-/KNQL8Nu5gCHLqwqfQjA689Hhoqgi2S84SNUxC3roTe4EhJ9AfLkp8QiQcU8AMzI" crossorigin="anonymous"></script>
<script>
    const joinRoomButton = document.getElementById('room-button');
    const messageInput = document.getElementById('message-input');
    const roomInput = document.getElementById('room-input');
    const form = document.getElementById('form');
    const socket = io("http://localhost:3000");
    socket.on('connect', () => {
        displayMessage(`Your connected as: ${socket.id}`);
    });
    socket.on('recieve-message', (message) => {
        displayMessage(`${message} : sent to all`);
    })

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const message = messageInput.value;
        const room = roomInput.value;

        if (message === "") return
        displayMessage(message);
        socket.emit("send-message", message, room);

        messageInput.value = "";

    });

    joinRoomButton.addEventListener("click", function(e) {
        const room = roomInput.value;

        socket.emit("join-room", room);
    });

    function displayMessage(message) {
        const div = document.createElement("div");
        div.textContent = message;
        document.getElementById("message-container").append(div);
    }
</script>




<?php


echo view('partial/validations_js');
?>

<script>
    $(document).ready(function() {



    });
</script>