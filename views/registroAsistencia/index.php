<?php $grupos = parent::ConsultarGrupos(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <title>Lista</title>
</head>

<body class="body-crear">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header ">
                <a class="title" href="?class=Index&view=index">Carlos Rangel Lamus
                </a>
                <p class="font">INSTRUCTOR</p>
            </div>
        </div>
    </nav>
<section>
    <h1 class="fontin">Llamado Lista</h1>
    <h3>Escoja un grupo</h3>
    <form action="?class=RegistroAsistencias&view=lista" method="post">
    <div class="form-group"> 
      <select name="id_grupo" class="form-control" required="true">
        <option value="" disabled="true" selected="true">---------</option>
        <?php foreach($grupos as $grupo): ?>
          <option value="<?php print($grupo->id_grupo); ?>"><?php print($grupo->nombre_grupo) ?></option>
        <?php endforeach; ?> 
      </select>
    </div>
      <a class="btn btn-info" href="?class=Index&view=instructor">Go Back</a>
      <button type="submit" class="btn btn-success" href="?class=Index&view=instructor">Pasar Lista</button>
    </form>
    <!-- <table class="table table-bordered table-striped table-collapse">
        <tr>
            <th>ID</th>
            <th>GRUPO/CURSO</th>
            <th>ESTUDIANTE</th>
            <th>ASISTIO</th>
            <th>FALLA</th>
            <th>RETARDO</th>
            <th>FALLA_JUSTIFICADA</th>
            <th>ACTUALIZAR</th>

        </tr>
        <td><a class="btn btn-info" href="?class=Index&view=actualizar">ACTUALIZAR DATOS</a></td>
    </table> -->
</section>



    <footer class="footer campo">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h4>Desarrolladores</h4>
                <p><a class="fondos" href="https://github.com/Dashell2514">{Dashell Carrero}</a> | <a class="fondos1"
                        href="https://github.com/Alexjh16">{Jhon Ramos}</a></p>
                <p><a class="fondos1" href="https://github.com/vaneXa02">{Vanessa Vega}</a> | <a class="fondos"
                        href="">{Kewin Angel}</a></p>
                <p><a class="fondos" href="">{Lucrecia}</a> | <a class="fondos1"
                        href="https://github.com/juancaro2002">{David Martinez}</a></p>
            </div>
            <div class="col-md-4">
                <h4>Ubicacion</h4>
                <iframe class="map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.1739954249406!2d-72.2304113498075!3d7.771366494371725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e666ca27803e231%3A0x9e40da4279e47568!2sEscuela%20Carlos%20Rangel%20Lamus!5e0!3m2!1ses!2sco!4v1569952924299!5m2!1ses!2sco"
                    width="420" height="120"></iframe>
            </div>
            <div class="col-md-4">
                <h4>Contactenos</h4>
                <a href="https://www.facebook.com/"><img class="fb" src="assets/libs/img/icons/facebook.png"
                        width="60"></a>
                <a href="https://www.instagram.com/"><img class="icon" src="assets/libs/img/icons/instagram.png"
                        width="60"></a>
                <a href="https://github.com/"><img class="icon" src="assets/libs/img/icons/github.png" width="60"></a>
                <div> &copy; Icons made by <a href="https://www.flaticon.es/autores/freepik" title="Freepik">Freepik</a>
                    from <a href="https://www.flaticon.es/" title="Flaticon">www.flaticon.com</a></div>
            </div>
        </div>
      </div>
    </footer>
</body>

</html>