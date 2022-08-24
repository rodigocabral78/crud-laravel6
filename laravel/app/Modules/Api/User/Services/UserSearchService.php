<?php

namespace App\Modules\Api\User\Services;

Final class UserSearchService
{
	# public function search($queryBuilder, $request)
	public function __invoke($queryBuilder, $request)
	{
		if ($request->id) {
			$queryBuilder->where("id", "=", $request->id);
		}

		if ($request->name) {
			$queryBuilder->where("name", "=", $request->name);
		}

		if ($request->email) {
			$queryBuilder->where("email", "=", $request->email);
		}

		if ($request->email_verified_at) {
			$queryBuilder->where("email_verified_at", "=", $request->email_verified_at);
		}

		if ($request->password) {
			$queryBuilder->where("password", "=", $request->password);
		}

		if ($request->remember_token) {
			$queryBuilder->where("remember_token", "=", $request->remember_token);
		}

		if ($request->order) {
			$order = ($request->order == "asc") ? "asc" : "desc";
			$queryBuilder->orderBy("id", $order);
		}

		return $queryBuilder->paginate(($request->count) ? $request->count : 10);
	}
}