<?php

/**
 * Copyright (C) 2024  NicheWork, LLC
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Mark A. Hershberger <mah@everybody.org>
 */

namespace MediaWiki\Extension\ConfirmAccount;

use MediaWiki\HookContainer\HookContainer;
use MediaWiki\User\User;

class HookRunner implements ConfirmAccount__checkRequestHook {
	private HookContainer $container;

	public function __construct( HookContainer $container ) {
		$this->container = $container;
	}

    // phpcs:ignore MediaWiki.NamingConventions.LowerCamelFunctionsName.FunctionName
	public function onConfirmAccount__checkRequest(
		User $user,
		array $params,
		string &$message
	): ?bool {
		return $this->container->run(
			'ConfirmAccount::checkRequest',
			[ $user, $params, &$message ]
		);
	}
}
