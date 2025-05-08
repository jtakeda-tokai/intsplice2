<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130959089-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-130959089-2');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>IntSplice ver. 2.0 result</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- jQuery (necessary for Bootstrap\'s JavaScript plugins) -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed-->
    <script src="js/bootstrap.min.js"></script>

    <!-- header -->
    <div id="header" class="container">
      <nav class="navbar navbar-default">
      <div class="navbar-header">
        <a class="navbar-brand">Result</a>
      </div>
      </nav>

<?php
  $ver = htmlspecialchars($_POST['ver']);
  $chr = htmlspecialchars($_POST['chr']);
  $pos = htmlspecialchars($_POST['pos']);

  $result = shell_exec( "bash ./extract_target_pos.sh $chr $pos divided_files_'$ver'_path");
  $lines = preg_split( '/\n/', $result );
  $nLine = count( $lines );

  if($nLine==1){
    echo "<font size=+1><b><u>SNV at ".$chr.":".$pos." can't be predicted by IntSplice ver.2.0.</u></b></font><br><br>";
  }
?>

    <!-- main -->
    <div class="container">
      <div class="row">

        <!-- Mainbar -->
        <div class="col-sm-11">
        Predicted pathogenicity in shown in “Prediction” along with “Pathogenic Probability”. Pathogenic Probability >= 0.5 is predicted to be “Pathogenic”.
        <br />

        <!-- Result Table -->
        <div class="container" style="padding:20px 0">
          <table class="table table-striped table-hover">
            <thead>
            <tr>
              <th>Prediction</th>
              <th>Pathogenic Probability</th>
              <th>Genomic Mutation</th>
              <th>Position from 3'ss of intron</th>
              <th>Strand</th>
              <th>Gene name, Ensembl 101 and exon No.</th>
            </tr>
            </thead>

            <tbody>

<?php
  for($iLine=1; $iLine<=$nLine-1; $iLine++){
    echo "<tr>";
    $element = preg_split('/\t/', $lines[$iLine-1]);
    $nElement = count( $element );

    if($element[10] >= 0.5){
      echo "<td><font color=red>Abnormal</font></td>";
    }else if($element[10] < 0.5){
      echo "<td>Normal</td>";
    }else{
      echo "<td>Not predicted</td>";
    }
    echo "<td>".$element[10]."</td>";
    echo "<td>g.".$element[1]."".$element[2].">".$element[3]."</td>";
    echo "<td>".$element[7]."</td>";
    echo "<td>".$element[8]."</td>";
    #echo "<td>".$element[9]."</td>";
    $anno = str_replace("::", "_", $element[9]);
    $anno2 = str_replace("||", ";", $anno);
    echo "<td>".$anno2."</td>";
    echo "</tr>";
  }
  echo "</table>";
  echo "<b><i>Input queries: $ver, $chr, $pos</b></i>";
?>

            </tbody>
          </table>
        </div>
        <!-- END OF Table -->

      </div>
    </div>
    <br>
    <input type="button"  value="Return" class="btn btn-info" onclick="history.back()">
    <br><br>
  </div>
  </body>
</html>

