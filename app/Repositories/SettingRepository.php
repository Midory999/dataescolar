<?php

namespace App\Repositories;

use App\Models\School;

interface SettingRepository {
	function backup(): bool;
	function restore(): bool;
	function hasBackup(): bool;
	function getSchool(): School;
}
