<?php

namespace App\Core;

// Dependencia de este módulo
use Flight;

/** Encargada de la renderización de plantillas ubicadas en __/views/pages/__ */
class UI {
	const VISITOR_LAYOUT = 'visitor-layout';
	const APP_LAYOUT = 'app-layout';

	private static string $layout = self::APP_LAYOUT;
	/** @var array<string, mixed> Datos compartidos entre páginas */
	private static array $sharedData = [
		'root' => '/dataescolar',
		'assets' => '/dataescolar/assets'
	];

	/**
	 * Renderiza una página del sistema
	 * @param  string                $page Nombre del archivo **sin extensión**
	 * @param  array<string, mixed>  $data Datos **opcionales** que necesita la página
	 */
	static function render(string $page, array $data = []): void {
		$data += self::$sharedData;
		Flight::render("pages/$page", $data, 'content');
		Flight::render(self::$layout);
	}

	static function changeLayout(string $layout = self::VISITOR_LAYOUT): void {
		self::$layout = $layout;
	}

	static function setData(string $dataName, mixed $dataValue): void {
		self::$sharedData[$dataName] = $dataValue;
	}
}
