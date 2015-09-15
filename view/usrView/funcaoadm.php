<?php
function pesquisa ($adm,$senhadm){
 $sql = "select user, Nome from adm where user like '$adm' and Senha like '$senhadm'";
 $res=mysql_query($sql);
 if (mysql_num_rows($res) == 1){
    $_SESSION["login"] = $adm ; 
    $_SESSION["nome"] = $senhadm;
    setcookie("tempo","existe",time()+10*60);
    return TRUE;}
 else echo "Usuario ou senha incorreto";
 mysql_query($sql) or die(mysql_error());}
 
function cadastraDM ($nome,$email,$usuario,$senha,$perfil){
 if (!empty($perfil["name"])){ 
 if(!preg_match("/(jpeg|png|gif|bmp)/", $perfil["type"]))
    $error[] = "Tipo de imagem nao suportado.";
 if (empty($error)) {
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $perfil["name"], $ext);
    $nomi = md5(uniqid(time())) . "." . $ext[1];
    $caminho = "img/" . $nomi;
    move_uploaded_file($perfil["tmp_name"], $caminho);
	$sql = "insert into adm values (null, '$nome', '$email', '$usuario', '$senha', '$nomi')";
	
	mysql_query($sql) or die(mysql_error());}
 if (!empty($error))
    foreach ($error as $erro)
    echo $erro . '<br>';}}

function category(){
 $sql = "select * from categoria";
 $res=mysql_query($sql);
 echo "<select name=selectCat>";
 while ($linha = mysql_fetch_array($res)) {
  echo "<option value=\"" . $linha['idCategoria'] . "\"> " . $linha['Descricao'] . "  </option>";}	
 echo "</select>";
 mysql_query($sql) or die(mysql_error()); }
 
function cadproduto ($nome,$marca,$modelo,$valor,$categoria,$qnt,$sta,$foto){
 if (!empty($foto["name"])){ 
 if(!preg_match("/(jpeg|png|gif|bmp)/", $foto["type"]))
    $error[] = "Tipo de imagem nao suportado.";
 if (empty($error)) {
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
    $nomi = md5(uniqid(time())) . "." . $ext[1];
    $caminho = "img/" . $nomi;
    move_uploaded_file($foto["tmp_name"], $caminho);
	$img= "insert into imagens values (null,'$nomi', codprod)";
	echo $img;
 mysql_query($img) or die(mysql_error()); }
 if (!empty($error))
    foreach ($error as $erro)
    echo $erro . '<br>';}
	$sql = "call insertP($nome, $marca, $modelo, $valor, $qnt, $sta,$categoria)";
 mysql_query($sql) or die(mysql_error());}
 
function users(){
 $sql = "select * from usuarios order by nome";
 $res = mysql_query($sql) or die(mysql_error());
while ($linha = mysql_fetch_array($res)) {
 echo "<b>Nome:</b> " . $linha['Nome'] . "<br/>";
 echo "<b>Email:</b> " . $linha['Email'] . "<br/><br/>";}}
 
function valores($idproduto){
 $query= "select * from produtos where idProdutos=$idproduto";
 $result = mysql_query($query) or die(mysql_error());
 $linha = mysql_fetch_array($result);
 echo "<tr><td>Descricao: </td><td> <input type='text' name='desc' value=".$linha['Descricao']."></td></tr>
  <tr><td>Marca: </td><td> <input type='text' name='marca' value=".$linha['Marca']."></td></tr>
  <tr><td>Modelo: </td><td> <input type='text' name='modelo' value=".$linha['Modelo']."></td></tr>
  <tr><td>Valor: </td><td> <input type='text' name='valor' value=".$linha['valor']."></td></tr>
  <tr><td>Estoque: </td><td> <input type='text' name='estoq' value=".$linha['estoque']."></td></tr>
  <tr><td>Status: </td><td> <input type='text' name='stat' value=".$linha['status']."></td></tr>";}

function cate($idproduto){
 $query="select * from produtos inner join categoria on produtos.idCategoria=categoria.idCategoria and produtos.idProdutos=$idproduto";
 $result = mysql_query($query) or die(mysql_error());
 echo "<select name= 'categor'>";
 while ($linha = mysql_fetch_array($result))
   echo "<option value=" . $linha['idCategoria'] . " selected>" . $linha['Descricao'] . "</option>";
 echo "</select>"; }
 
function muda($idproduto,$desc,$marca,$modelo,$reals,$cat,$sta,$qnt){
 $query="call alteraP('$desc', '$marca', '$modelo', $reals, $qnt, $sta, $cat, $idproduto)";
 $result=mysql_query($query) or die(mysql_error());
 echo 'Feitooooooooooooooo!<br><br>'; }

function disab($id){
 $query = "update produtos set status=0 where idProdutos=$id";
 mysql_query($query) or die(mysql_error());
 header("location: home.php");
}
 

 
 
 
 
 
 

?>