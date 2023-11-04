<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    @vite(['resources/css/style.css'])
    <title>Admin</title>
    <style>

        #chatbotContainer {
          position: fixed;
          bottom: 0;
          right: 0;
          z-index: 1;
        }


        #chatbotFrame {
          display: none;
        }
      </style>
  </head>
<body
    style="
        background: url(/img/wallper/fondo_P.png) center center/cover no-repeat;
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        ">

  <x-layouts.navbar/>
    <div>
        {{ $slot }}
        <div id="chatbotContainer">
            <img id="showChatButton" src="chatbot.png" alt="Mostrar Chat" />
            <img id="minimizeChatImage" src="minimiza.png" alt="Minimizar Chat" style="display: none;" />

            <iframe
              id="chatbotFrame"
              allow="microphone;"
              width="350"
              height="430"
              src="https://console.dialogflow.com/api-client/demo/embedded/b7136b01-4831-4de4-9960-be7b496cc529">
            </iframe>
          </div>
    </div>

      <!-- Optional JavaScript; choose one of the two! -->
      <script>
        const chatbotContainer = document.getElementById('chatbotContainer');
        const showChatButton = document.getElementById('showChatButton');
        const minimizeChatImage = document.getElementById('minimizeChatImage');
        const chatbotFrame = document.getElementById('chatbotFrame');

        showChatButton.addEventListener('click', () => {
          chatbotFrame.style.display = 'block';
          showChatButton.style.display = 'none';
          minimizeChatImage.style.display = 'block';
        });

        minimizeChatImage.addEventListener('click', () => {
          chatbotFrame.style.display = 'none';
          minimizeChatImage.style.display = 'none';
          showChatButton.style.display = 'block';
        });
      </script>

  <script type="text/JavaScript">
  window.addEventListener('scroll', reveal);
  function reveal() {
      var reveals = document.querySelectorAll('.reveal')
      for(var i = 0; i < reveals.length ; i++){
          var windowheight = window.innerHeight;
          var revealTop = reveals[i].getBoundingClientRect().top;
          var revealpoint = 150;
          if( revealTop < windowheight - revealpoint){
              reveals[i].classList.add('active');
          }
          else{
              reveals[i].classList.remove('active');
          }
      }
    }
  </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
