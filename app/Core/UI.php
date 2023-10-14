<?php

namespace App\Core;

// Dependencia de este módulo
use Flight;

/** Encargada de la renderización de plantillas ubicadas en __/views/pages/__ */
class UI {
	/**
	 * Renderiza una página del sistema
	 * @param  string                $page Nombre del archivo **sin extensión**
	 * @param  ?array<string, mixed> $data Datos **opcionales** que necesita la página
	 */
	static function render(string $page, ?array $data = null): void {
		$data['root'] = '/dataescolar';
		Flight::render("pages/$page", $data, 'content');
		Flight::render('layout', ['assets' => '/dataescolar/assets']);
	}
}
