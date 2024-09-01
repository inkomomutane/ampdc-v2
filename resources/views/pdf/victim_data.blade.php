<html>
<head>
    <title>Dados da vítima</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap");
        body {

        }
        .head-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .text-center {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        .uppercase{
            text-transform: uppercase;
        }
        .underline{
            text-decoration: underline;
        }
        .document{
            line-height: 1.5;

        }
    </style>
</head>
<body>
<section>
    <h5 class="text-center head-title uppercase ">
        Dados da vítima
    </h5>
    <p class="document">
        <strong>Nome:</strong> <span class="underline">{{ $victim->name }}</span> <br>
         <strong>1. Historia de vida e contexto familiar:</strong><br>
        <strong>Idade:</strong> <span class="underline">{{ $victim->age }}</span> <br>
        <strong>Sexo:</strong> <span class="underline">{{ $victim->gender }}</span> <br>
    </p>
</section>

</body>
</html>
