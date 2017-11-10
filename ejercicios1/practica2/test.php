<?php

	require_once("component.php");

	$pb1 = new PlacaBase("0001", "MSI", "50", "MSI eXtreme", "Placa base", "3.0", "4");
	$pb1->setPreu("65");
	/* $mb0001->imprimir_descripcio($mb0001); */
	$pb2 = new PlacaBase("0002", "EVGA", "80", "EVGA Lucid", "Placa base", "3.0", "8");
	$pb2->setNumSerie(123456789);
	/* $mb0002->imprimir_descripcio($mb0002); */
 	/*
	$mr1 = new Memoriesram("0003", "Crucial", "30", "Crucial Mate", "Memoria Ram", "4", "2133", "DDR3");
	$mr1->setNewGbRam("8");
	/* $mr0001->imprimir_descripcio($mr0001); */
	/*$mr2 = new MemoriaRam("0004", "Reaper", "50", "Reaper RAM", "Memoria Ram", "5", "2133", "DDR4");
	$mr2->setNewTipus("DDR3");
	/* $mr0002->imprimir_descripcio($mr0002); */
	/*$cpu1 = new Processador("0005", "Intel", "100", "Intel i3", "Processador", "4", "2.5");
	$cpu1->setNewNom("Intel i5 5730");
	/* $cpu0001->imprimir_descripcio($cpu0001); */
	/*$cpu2 = new Processadors("0006", "Intel", "100", "Intel i7 4790", "Processador", "5", "3");
	$cpu2->setGhzCpu("2");
	/* $cpu0002->imprimir_descripcio($cpu0002); */

	$inventori = [$pb1, $pb2];
	$total = count($inventori);

	for($i = 0; $i < $total; $i++) {
		$inventori[$i]->imprimir_descripcio($inventori[$i]);
	}
?>
