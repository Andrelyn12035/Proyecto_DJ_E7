<?php include("db.php"); ?>
<?php include("header.php")?>
    <div class="container-lg my-auto mx-4">
    <div class="" style="margin-top:8rem; ">
        <h3 style="display:inline;" class="ml-5">Cliente</h3>
        <div style="display:inline;" class="ml-5">
        <a  href="../form.html"><button type="button" class="btn btn-primary btn-lg">AGREGAR</button></a>
        </div>
    </div>

    
    <table class="table table-bordered mt-4">
        <tr>
            <th>CURP</th>
            <th>Nombre</th>
            <th>AMaterno</th>
            <th>APaterno</th>
            <th>Num_cas</th>
            <th>Colonia</th>
            <th>Alcadia</th>
            <th>CP</th>
            <th>Estado</th>
            <th>Email</th>
            <th></th>
        </tr>
        <tbody>
            <!--Consulatas a la base  -->
        </tbody>
    </table>

    </div>
<?php include("footer.php")?>
