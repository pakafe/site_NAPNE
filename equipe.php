<?php require "cabecalho.php"; ?>

<section id="content-equipe">
  <ul>

  <?php include"painel_napne/conexao.php"; ?>
  <?php $sql = mysql_query("SELECT * FROM teams order by id ASC");
     $row = mysql_fetch_array($sql, MYSQL_ASSOC) or die() ;  ?>

     <li><h1>Equipe do Napne</h1></li>
<?php 
      do              
               {
                 ?> <li> <?php echo $row['name']."" ?> 
                 <a href="<?php echo $row['lattes']; ?>">lattes</a> </li>                  
                    <!-- $row['lattes'] -->
                   <?php 
               } while ($row = mysql_fetch_array($sql));
                ?>


    <!-- <li> Professor Coordenador do Napne - Raymundo Carlos Machado Ferreira Filho <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4706870J8 ">Lattes</a></li>
    <li>Fabiane Beletti da Silva <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4264920A2 ">Lattes</a></li>
    <li>Patrick Prestes <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K8541014A8 ">Lattes</a></li>
    <li>Renan Zafalon da Silva <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4458223H4 ">Lattes</a></li>        
    <li>Tania Zehetmeyr <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4410438J0 ">Lattes</a></li>
    <li>Margarete Müller Vieira <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4594270P2 ">Lattes</a></li>
    <li>Lourdes Helena Dummer Venzke <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4185938T3 ">Lattes</a></li>
    <li>Simone Teixeira Barrios <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4228329D6 ">Lattes</a></li>
    <li>Maria de Lourdes Guidotti dos Santos <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K8178130Z3 ">Lattes</a></li>
    <li>Marisa Teresinha Pereira Neto Cancela <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4252016E8">Lattes</a></li>
    <li>Marcos Gabriel Nunes Schmalfuss <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4318671U3 ">Lattes</a></li> -->

  </ul>

</section>


<?php require "rodape.php";?>