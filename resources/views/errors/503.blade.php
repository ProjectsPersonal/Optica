<!DOCTYPE html>
<html>
    <head>
        <title>Usted no esta autorizado!</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #fff;
                background-color: #d73519;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
            .paragraph {
                font-size: 50px;
                margin-bottom: 40px;
            }
            .paragraph2 {
                font-size: 18px;
                bottom: 20px;
                right: 30px;
                position: fixed;
                text-align: center;
                display: table-cell;
            }
            .button {
              color: rgb(255, 255, 255);
              border-radius: 3px;
              padding: 13px;
              background-color: rgb(249, 111, 22);
              border: none;
              top: 30px;
              right: 30px;
            }
            .button:hover{
              background-color: rgb(237, 124, 51);
            }
            .divbtn{
              top: 30px;
              right: 30px;
              position: fixed;
            }
        </style>
    </head>
    <body>
        <div class="container">
              <div class="divbtn">
                <button onclick="goBack()" class="button">Volver atras</button>
              </div>
              <div class="content">
                <div class="title">Acceso denegado!</div>
                <div class="paragraph">Usted no tiene acceso a este modulo.</div>
                <div class="paragraph2">Codev 2017 - Optica Ramirez Contacte con un administrador en caso que fuera un error.</div>
              </div>
        </div>
        <script>
        function goBack() {
            window.history.back();
        }
        </script>
    </body>
</html>
