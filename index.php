<?php require_once('Connections/Conteste.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO aluno (nome, naturalidade, nacionalidade, bairro, rua, municipio, provincia, dataNascimento, eMail, telefone, sexo, nomePai, nomeMa, dacumentoDeIdentificacao, numeroDoDocumentoDeIdentificacao, dataValidadeDocumentoDeIdentificacao, `data`, idade, liguaOpcao, idClasse, idPeriodo, idCurso, idEncarecadoDeEducacao, idFuncionario, idTurma) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['naturalidade'], "text"),
                       GetSQLValueString($_POST['nacionalidade'], "text"),
                       GetSQLValueString($_POST['bairro'], "text"),
                       GetSQLValueString($_POST['rua'], "text"),
                       GetSQLValueString($_POST['municipio'], "text"),
                       GetSQLValueString($_POST['provincia'], "text"),
                       GetSQLValueString($_POST['dataNascimento'], "text"),
                       GetSQLValueString($_POST['eMail'], "text"),
                       GetSQLValueString($_POST['telefone'], "text"),
                       GetSQLValueString($_POST['sexo'], "text"),
                       GetSQLValueString($_POST['nomePai'], "text"),
                       GetSQLValueString($_POST['nomeMa'], "text"),
                       GetSQLValueString($_POST['dacumentoDeIdentificacao'], "text"),
                       GetSQLValueString($_POST['numeroDoDocumentoDeIdentificacao'], "text"),
                       GetSQLValueString($_POST['dataValidadeDocumentoDeIdentificacao'], "text"),
                       GetSQLValueString($_POST['data'], "text"),
                       GetSQLValueString($_POST['idade'], "int"),
                       GetSQLValueString($_POST['liguaOpcao'], "text"),
                       GetSQLValueString($_POST['idClasse'], "int"),
                       GetSQLValueString($_POST['idPeriodo'], "int"),
                       GetSQLValueString($_POST['idCurso'], "int"),
                       GetSQLValueString($_POST['idEncarecadoDeEducacao'], "int"),
                       GetSQLValueString($_POST['idFuncionario'], "int"),
                       GetSQLValueString($_POST['idTurma'], "int"));

  mysql_select_db($database_Conteste, $Conteste);
  $Result1 = mysql_query($insertSQL, $Conteste) or die(mysql_error());

  $insertGoTo = "sucesso.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nome completo:</td>
      <td><input type="text" name="nome" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Naturalidade:</td>
      <td><input type="text" name="naturalidade" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nacionalidade:</td>
      <td><input type="text" name="nacionalidade" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Bairro:</td>
      <td><input type="text" name="bairro" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Rua:</td>
      <td><input type="text" name="rua" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Municipio:</td>
      <td><input type="text" name="municipio" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Provincia:</td>
      <td><input type="text" name="provincia" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">DataNascimento:</td>
      <td><input type="text" name="dataNascimento" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">EMail:</td>
      <td><input type="text" name="eMail" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Telefone:</td>
      <td><input type="text" name="telefone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sexo:</td>
      <td><input type="text" name="sexo" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">NomePai:</td>
      <td><input type="text" name="nomePai" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">NomeMa:</td>
      <td><input type="text" name="nomeMa" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">DacumentoDeIdentificacao:</td>
      <td><input type="text" name="dacumentoDeIdentificacao" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">NumeroDoDocumentoDeIdentificacao:</td>
      <td><input type="text" name="numeroDoDocumentoDeIdentificacao" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">DataValidadeDocumentoDeIdentificacao:</td>
      <td><input type="text" name="dataValidadeDocumentoDeIdentificacao" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Data:</td>
      <td><input type="text" name="data" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Idade:</td>
      <td><input type="text" name="idade" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Ligua Opcao:</td>
      <td><input type="text" name="liguaOpcao" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">IdClasse:</td>
      <td><input type="text" name="idClasse" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">IdPeriodo:</td>
      <td><input type="text" name="idPeriodo" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">IdCurso:</td>
      <td><input type="text" name="idCurso" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">IdEncarecadoDeEducacao:</td>
      <td><input type="text" name="idEncarecadoDeEducacao" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">IdFuncionario:</td>
      <td><input type="text" name="idFuncionario" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">IdTurma:</td>
      <td><input type="text" name="idTurma" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Matricular" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>