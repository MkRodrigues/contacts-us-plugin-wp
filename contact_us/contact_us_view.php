<head>
    <style>
        label {
            font-family: 'Verdana';
            font-size: 18px;
        }

        .container {
            margin: 15px 0;
        }

        .container input {
            border-radius: 10px;
        }

        .radius {
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <form method="POST">

        <div class="container">
            <label for="nome">Nome</label>
            <input class="" type="text" name="nome" id="">
        </div>

        <div class="container">
            <label for="email">E-mail</label>
            <input class="" type="text" name="email" id="">
        </div>

        <div class="container">
            <label for="assunto">Assunto</label>
            <input class="" type="text" name="assunto" id="">
        </div>

        <div class="container">
            <label for="mensagem">Mensagem</label>
            <textarea class="radius" name="mensagem" id="" cols="30" rows="10" placeholder="Insira sua mensagem aqui: "></textarea>
        </div>

        <input type="submit" name="enviar" value="Enviar Mensagem">

    </form>

</body>