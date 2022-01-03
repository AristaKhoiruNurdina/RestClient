<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?= base_url('Assets/css/materialize.min.css') ?>" media="screen,projection" />
    <title>CHARACTER VALORANT</title>
</head>

<body>
<div class="navbar-fixed ">
        <nav class="#03a9f4 light-blue">
            <div class="nav-wrapper container ">
                <a href="#" class="brand-logo">VALORANT</a>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="topnav right hide-on-med-and-down">
                    <li><a href="<?= base_url('hero') ?>">Tampilan Semua Karakter</a></li>
                </ul>
            </div>
        </nav>
    </div>
    
    <div class="container">
        
<font color="orange">
    
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<br>
<div>
<a class="#00e676 green accent-3 btn" href="<?= base_url('hero/create') ?>"> TAMBAH DATA</a>
</div>
<br>


<table class="striped" border="1">
   <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Peran</th>
        <th>Biodata</th>
        <th>Gambar</th>
        <th>Action</th>
    </tr>

    <?php
    foreach ($datahero as $client){
         echo "<tr>
              <td>$client->id_hero</td>
              <td>$client->nama</td>
              <td>$client->peran</td>
              <td>$client->biodata</td> 
              <td><img src=".$client->url_hero." width='350' height='200'></td>
              
              <td>".anchor('hero/edit/'.$client->id_hero,'Edit')."
                ".anchor('hero/delete/'.$client->id_hero,'Delete')."
                </td>
              </tr>";
             
    } 
    ?>
</table>
<script type="text/javascript" src="<?= base_url('Assets/js/materialize.min.js') ?>"></script>
</body>

</html>