<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votación Clarissa y Pedro</title>
    <style>
        body {
          font-family: Arial, sans-serif;
          text-align: center;
          margin: 0;
          padding: 0;
          height: 100vh;
          background-image: url('https://i.gifer.com/7t5M.gif');
          background-size: cover;
          background-position: center;
          background-repeat: no-repeat;
          color: white;
        }
        
        .vote-button {
          font-size: 40px;
          padding: 20px 20px;
          margin: 20px;
          width: 250px;
          height: 200px;
          border-radius: 10px;
          cursor: pointer;
        }
        
        #clarissa-button {
          background-color: #bc59de;
          color: white;
        }
        
        #pedro-button {
          background-color: #4ba1e3;
          color: white;
        }
        
        .vote-count {
          font-size: 24px;
          margin-top: 10px;
          color: white;
          font-size: 25px;
        }
        .vote-countT {
          font-size: 24px;
          margin-top: 10px;
          color: white;
          font-size: 35px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <br><br>
  <center><h1 class="vote-countT">¿Cúal es la mejor casa de jengibre?</h1></center>
  <br>
    <div class="row">
        <div class = "col-sm-1"></div>
        <div class = "col-sm-5">
            <center>
                <button id="clarissa-button" class="vote-button" onclick="voteFor('Clarissa')">Clarissa</button><br>
                <div id="clarissa-count" class="vote-count">Votos por Clarissa: 0</div>
            </center>
        </div>
        <div class = "col-sm-5">
            <center>
                <button id="pedro-button" class="vote-button" onclick="voteFor('Pedro')">Pedro</button><br>
                <div id="pedro-count" class="vote-count">Votos por Pedro: 0</div>
            </center>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    <script>
        let clarissaVotes = 0;
        let pedroVotes = 0;
        
        function voteFor(person) {
          if (person === 'Clarissa') {
            clarissaVotes++;
            document.getElementById('clarissa-count').textContent = 'Votos por Clarissa: ' + clarissaVotes;
          } else if (person === 'Pedro') {
            pedroVotes++;
            document.getElementById('pedro-count').textContent = 'Votos por Pedro: ' + pedroVotes;
          }
        }
    </script>
</body>
</html>
