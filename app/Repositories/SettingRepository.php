<?php

namespace App\Repositories;

interface SettingRepository {
	function backup(): bool;
	function restore(): bool;
}
