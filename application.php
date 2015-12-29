<?php
session_start();
if (!isset($_SESSION['login']))
  header('Location: index.php');
include 'config/database.php';
include 'header.php';
?>
<div class="content">
  <input type="file" accept="image/*;capture=camera">
  <video autoplay></video>
  <img src="">
  <canvas style="display:none;"></canvas>

  <script>
    var video = document.querySelector('video');
    var canvas = document.querySelector('canvas');
    var ctx = canvas.getContext('2d');
    var localMediaStream = null;

    function snapshot() {
      if (localMediaStream) {
        document.querySelector('img').src = canvas.toDataURL('png');
      }
    }

    video.addEventListener('click', snapshot, false);

    // Not showing vendor prefixes or code that works cross-browser.
    navigator.getUserMedia({video: true}, function(stream) {
      video.src = window.URL.createObjectURL(stream);
      localMediaStream = stream;
    }, errorCallback);
  </script>
</div>
