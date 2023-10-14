<?php

namespace App\Models;

enum Role: string {
	case ADMIN = 'Administrador';
	case PRINCIPAL = 'Director';
	case SECRETARY = 'Secretario';
	case TEACHER = 'Profesor';
}
