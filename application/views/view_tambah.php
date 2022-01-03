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
                    <li><a href="<?= base_url('hero') ?>">Semua Karakter</a></li>
                </ul>
            </div>
        </nav>
    </div>
 
    <div class="container">
        
<?php echo form_open_multipart('hero/create');?>
<table>
    <tr><td>Nama</td><td><?php echo form_input('nama');?></td></tr>
    <tr><td>Peran</td><td><?php echo form_input('peran');?></td></tr>   
    <tr><td>Biodata</td><td><?php echo form_input('biodata');?></td></tr>   
    <tr><td>Link Gambar</td><td><?php echo form_input('url_hero');?></td></tr>         
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('hero','Kembali');?></td></tr>
</table>

<?php
echo form_close();
?>

</div>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="<?= base_url('Assets/js/materialize.min.js') ?>"></script>
    
</body>

</html>