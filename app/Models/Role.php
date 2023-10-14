<?php

namespace App\Models;

/** Roles de los usuarios del sistema */
enum Role: string {
	case ADMIN = 'Administrador';
	case PRINCIPAL = 'Director';
	case SECRETARY = 'Secretario';
	case TEACHER = 'Profesor';
}
