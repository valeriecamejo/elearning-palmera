<!DOCTYPE html>
<html lang="es">

<head>
<title>Titulo de la web</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="alternate" title="Pozolería RSS" type="application/rss+xml" href="/feed.rss" />
</head>

<style>
  #border {
  padding: 3px 10px;
  border: PowderBlue 5px double;
  border-top-left-radius: 20px;
  border-bottom-right-radius: 20px;
  text-align: center;
}
</style>

<body id='border'>
    <header>
       <h1>Certificado</h1>
    </header>
      <div>
        <p>El presente certificado es para:</p>
      <h2>{{ $user->name }} {{ $user->last_name }}<h2>
        <p> Por haber aprobado el curso <b>{{ $evaluation_data->name }}</b> obteniendo un puntaje de {{ $user_evaluation->score }} puntos. </p>
      </div>
				<div class="col-md-6">
            {{ $brand->name }}
				</div>
        <div class="col-md-6">
          <?php
            $originalDate = $user_evaluation->created_at;
            $newDate = date("d/m/Y", strtotime($originalDate));
          ?>
          {{ $newDate }}
        </div>
    <footer>
    </footer>
</body>
</html>