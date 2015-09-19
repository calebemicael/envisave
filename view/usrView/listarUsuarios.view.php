<div id='corpe'>
<br><div id='post'>
	<table>
<?php
	foreach ($lista as $v) {
?>
		<tr>
			<td>
				<?php echo $v->getNome()." - ".$v->getCidade(). " (".$v->getEstado().")";?>
			</td>
			<td>
				<a href=perfil.php?id='<?php $v->getId();?>'>Ver</a>
			</td>
		</tr>
<?php
}
?>
    </table></div>



